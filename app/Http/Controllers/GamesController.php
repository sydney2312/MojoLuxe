<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PointsTransaction;
use App\Models\PointsWallet;
use App\Models\UserGameScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ─────────────────────────────────────────────────────────
    // POST /quests/memory  →  quests.memory
    // ─────────────────────────────────────────────────────────
    public function submitMemoryScore(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'score' => 'required|integer|min:0',
        ]);

        return $this->saveScore($request);
    }

    // ─────────────────────────────────────────────────────────
    // POST /quests/other  →  quests.other   (Paw Roulette, etc.)
    // ─────────────────────────────────────────────────────────
    public function submitOtherGameScore(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'score' => 'required|integer|min:0',
        ]);

        return $this->saveScore($request);
    }

    // ─────────────────────────────────────────────────────────
    // Shared save logic
    // ─────────────────────────────────────────────────────────
    private function saveScore(Request $request)
    {
        $user = Auth::user();
        $game = Game::findOrFail($request->game_id);

        // Cooldown check
        $playedRecently = UserGameScore::where('user_id', $user->id)
            ->where('game_id', $game->id)
            ->where('played_at', '>=', now()->subSeconds($game->cooldown_seconds))
            ->exists();

        if ($playedRecently) {
            return response()->json([
                'error' => 'You already played this game recently. Come back later!',
            ], 400);
        }

        $score = (int) $request->score;
        $pointsEarned = min($score, $game->points_reward);

        // Persist score
        UserGameScore::create([
            'user_id' => $user->id,
            'game_id' => $game->id,
            'score' => $score,
            'points_earned' => $pointsEarned,
            'played_at' => now(),
        ]);

        // Award points
        $this->awardPoints($user->id, $pointsEarned, "game_{$game->id}");

        $wallet = PointsWallet::where('user_id', $user->id)->first();

        return response()->json([
            'points_earned' => $pointsEarned,
            'new_balance' => $wallet->points_balance,
        ]);
    }

    // ─────────────────────────────────────────────────────────
    // Points helper
    // ─────────────────────────────────────────────────────────
    private function awardPoints(int $userId, int $points, string $description): void
    {
        if ($points <= 0) {
            return;
        }

        $wallet = PointsWallet::firstOrCreate(
            ['user_id' => $userId],
            ['points_balance' => 0]
        );

        $wallet->increment('points_balance', $points);

        PointsTransaction::create([
            'user_id' => $userId,
            'points' => $points,
            'type' => 'earn',
            'description' => $description,
        ]);
    }
}
