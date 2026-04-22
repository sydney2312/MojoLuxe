<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Quiz</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f6f8; }
        .container { max-width: 1200px; margin: auto; padding: 30px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .header h1 { margin: 0; font-size: 26px; }
        .header p { margin: 5px 0 0; color: #666; }
        .btn-group { display: flex; gap: 10px; align-items: center; }
        .btn { background: #111827; color: white; padding: 10px 14px; border-radius: 8px; text-decoration: none; font-size: 14px; border: none; cursor: pointer; display: inline-block; }
        .btn:hover { opacity: 0.85; }
        .btn-gray { background: #6b7280; }
        .btn-red { background: #dc2626; }
        .btn-blue { background: #2563eb; }
        .btn-sm { padding: 6px 10px; font-size: 12px; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        thead { background: #111827; color: white; }
        th, td { padding: 14px; text-align: left; border-bottom: 1px solid #eee; font-size: 14px; }
        tr:hover td { background: #f9fafb; }
        .badge-answer { background: #d1fae5; color: #065f46; padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; }
        .actions { display: flex; gap: 8px; }
        .options { font-size: 12px; color: #888; margin-top: 3px; }
    </style>
</head>
<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Daily Quiz</h1>
            <p>Manage quiz questions</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-gray">← Dashboard</a>
            <a href="{{ route('admin.quiz.create') }}" class="btn">+ Add Question</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-red">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Active Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questions as $q)
            <tr>
                <td style="color:#999;font-size:13px;">{{ $q->id }}</td>
                <td>
                    <strong>{{ $q->question }}</strong>
                    <div class="options">A: {{ $q->option_a }} &nbsp;·&nbsp; B: {{ $q->option_b }} &nbsp;·&nbsp; C: {{ $q->option_c }} &nbsp;·&nbsp; D: {{ $q->option_d }}</div>
                </td>
                <td><span class="badge-answer">{{ $q->correct_answer }}</span></td>
                <td style="color:#555;font-size:13px;">{{ $q->date_active ?? '—' }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.quiz.edit', $q->id) }}" class="btn btn-blue btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.quiz.destroy', $q->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-red btn-sm" onclick="return confirm('Delete this question?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
