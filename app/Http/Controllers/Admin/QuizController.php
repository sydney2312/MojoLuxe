<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyQuiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $questions = DailyQuiz::orderBy('date_active', 'desc')->get();

        return view('admin.quiz.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.quiz.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d',
            'date_active' => 'nullable|date',
        ]);

        DailyQuiz::create($request->only([
            'question', 'option_a', 'option_b', 'option_c',
            'option_d', 'correct_answer', 'date_active',
        ]));

        return redirect()->route('admin.quiz.index')->with('success', 'Question added.');
    }

    public function edit(DailyQuiz $quiz)
    {
        return view('admin.quiz.edit', ['question' => $quiz]);
    }

    public function update(Request $request, DailyQuiz $quiz)
    {
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d',
            'date_active' => 'nullable|date',
        ]);

        $quiz->update($request->only([
            'question', 'option_a', 'option_b', 'option_c',
            'option_d', 'correct_answer', 'date_active',
        ]));

        return redirect()->route('admin.quiz.index')->with('success', 'Question updated.');
    }

    public function destroy(DailyQuiz $quiz)
    {
        $quiz->delete();

        return back()->with('success', 'Question deleted.');
    }
}
