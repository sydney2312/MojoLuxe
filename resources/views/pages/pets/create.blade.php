<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Profile</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f4f5f7; margin: 0; }
        nav { background: linear-gradient(135deg,#667eea,#764ba2); padding: 15px; color: white; display: flex; justify-content: space-between; align-items: center; }
        nav a { color: white; text-decoration: none; margin-left: 20px; }
        .container { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        h1 { font-size: 2rem; color: #1f2937; margin-bottom: 10px; }
        .card { background: white; border-radius: 12px; padding: 25px; margin-bottom: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        .card h2 { font-size: 1.5rem; margin-bottom: 15px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-weight: 500; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px; }
        .btn { padding: 10px 20px; border: none; border-radius: 8px; color: white; background: #667eea; cursor: pointer; text-decoration: none; display: inline-block; margin-top: 10px; }
        .pet-info { display: flex; align-items: center; gap: 15px; margin-bottom: 10px; }
        .pet-avatar { width: 80px; height: 80px; border-radius: 50%; background: #667eea; color: white; font-size: 2rem; display: flex; justify-content: center; align-items: center; }
    </style>
</head>
<body>

    <!-- Nav Bar -->
    <nav>
        <div><a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a></div>
        <div>
            <a href="{{ route('profile.index') }}">Profile</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </div>
    </nav>

    <div class="container">

        <!-- User Info -->
        <div class="card">
            <h2>Your Information</h2>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                </div>
                <button type="submit" class="btn">Update Profile</button>
            </form>
        </div>



</body>
</html>
