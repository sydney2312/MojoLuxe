<?php

namespace App\Http\Controllers;

use App\Models\DailyQuiz;
use App\Models\PointsTransaction;
use App\Models\PointsWallet;
use App\Models\UserQuizAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyQuizController extends Controller
{
    public function showQuests()
    {
        $user = Auth::user();

        $quiz = DailyQuiz::whereDate('date_active', Carbon::today())->first();

        $alreadyAnswered = $quiz
            ? UserQuizAnswer::where('user_id', $user->id)
                            ->where('quiz_id', $quiz->id)
                            ->exists()
            : false;

        $wallet = PointsWallet::firstOrCreate(
            ['user_id' => $user->id],
            ['points_balance' => 0]
        );

        return view('pages.default.quests', compact('quiz', 'alreadyAnswered', 'wallet'));
    }

    public function submitQuizAnswer(Request $request)
    {
        $user = Auth::user();

        $quiz = DailyQuiz::whereDate('date_active', Carbon::today())->first();

        if (!$quiz) {
            return response()->json(['message' => 'No quiz available today.'], 404);
        }

        $alreadyAnswered = UserQuizAnswer::where('user_id', $user->id)
                                         ->where('quiz_id', $quiz->id)
                                         ->exists();

        if ($alreadyAnswered) {
            return response()->json(['message' => 'You already answered this quiz today.'], 403);
        }

        $answer = strtolower(trim($request->input('answer')));
        $correct = $answer === strtolower(trim($quiz->correct_answer));
        $points = $correct ? 50 : 0;

        // Save answer — uses is_correct not correct
        UserQuizAnswer::create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'selected_answer' => $answer,
            'is_correct' => $correct,
            'points_earned' => $points,
        ]);

        // Award points directly — no relying on User model methods
        $newBalance = $this->awardPoints($user->id, $points, 'Daily quiz reward');

        return response()->json([
            'correct' => $correct,
            'points' => $points,
            'message' => $correct ? 'Correct! 🎉' : 'Wrong answer.',
            'new_balance' => $newBalance,
        ]);
    }

    // ── Points helper (self-contained, no User model dependency) ──
    private function awardPoints(int $userId, int $points, string $description): int
    {
        $wallet = PointsWallet::firstOrCreate(
            ['user_id' => $userId],
            ['points_balance' => 0]
        );

        if ($points > 0) {
            $wallet->increment('points_balance', $points);

            PointsTransaction::create([
                'user_id' => $userId,
                'points' => $points,
                'type' => 'earn',
                'description' => $description,
            ]);
        }

        return $wallet->fresh()->points_balance;
    }
}
