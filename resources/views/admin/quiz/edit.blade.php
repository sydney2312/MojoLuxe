<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Quiz Question</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; }
        .container { max-width: 700px; margin: auto; padding: 30px; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.06); }
        label { font-size: 13px; display: block; margin-top: 14px; color: #444; font-weight: 600; }
        input, textarea, select { width: 100%; padding: 10px; margin-top: 5px; border-radius: 8px; border: 1px solid #ddd; font-size: 14px; box-sizing: border-box; }
        input:focus, textarea:focus, select:focus { outline: none; border-color: #111827; }
        .btn { display: block; margin-top: 20px; width: 100%; padding: 12px; border: none; background: #111827; color: white; border-radius: 8px; cursor: pointer; font-size: 15px; }
        .btn:hover { opacity: 0.9; }
        .back { display: inline-block; margin-bottom: 15px; text-decoration: none; color: #111827; font-size: 14px; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px; }
    </style>
</head>
<body>
<div class="container">

    <a class="back" href="{{ route('admin.quiz.index') }}">← Back to Quiz</a>

    <div class="card">
        <h2 style="margin-top:0;">Edit Question #{{ $question->id }}</h2>

        <form method="POST" action="{{ route('admin.quiz.update', $question->id) }}">
            @csrf
            @method('PUT')

            <label>Question</label>
            <textarea name="question" rows="2" required>{{ $question->question }}</textarea>

            <div class="grid-2">
                <div>
                    <label>Option A</label>
                    <input type="text" name="option_a" value="{{ $question->option_a }}" required>
                </div>
                <div>
                    <label>Option B</label>
                    <input type="text" name="option_b" value="{{ $question->option_b }}" required>
                </div>
            </div>

            <div class="grid-2">
                <div>
                    <label>Option C</label>
                    <input type="text" name="option_c" value="{{ $question->option_c }}" required>
                </div>
                <div>
                    <label>Option D</label>
                    <input type="text" name="option_d" value="{{ $question->option_d }}" required>
                </div>
            </div>

            <div class="grid-2">
                <div>
                    <label>Correct Answer</label>
                    <select name="correct_answer" required>
                        @foreach(['a','b','c','d'] as $opt)
                            <option value="{{ $opt }}" {{ $question->correct_answer === $opt ? 'selected' : '' }}>{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Active Date</label>
                    <input type="date" name="date_active" value="{{ $question->date_active }}">
                </div>
            </div>

            <button type="submit" class="btn">Update Question</button>
        </form>
    </div>

</div>
</body>
</html>
