<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Users</title>
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
        .btn-indigo { background: #4f46e5; }
        .btn-sm { padding: 6px 10px; font-size: 12px; }
        .alert-success { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 13px; }
        .alert-error { background: #fee2e2; color: #991b1b; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
        thead { background: #111827; color: white; }
        th, td { padding: 14px; text-align: left; border-bottom: 1px solid #eee; font-size: 14px; }
        tr:hover td { background: #f9fafb; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; color: white; display: inline-block; }
        .badge-admin { background: #4f46e5; }
        .badge-user { background: #9ca3af; }
        .avatar { width: 34px; height: 34px; border-radius: 50%; background: #111827; color: white; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; }
        .name-cell { display: flex; align-items: center; gap: 10px; }
    </style>
</head>
<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Users</h1>
            <p>View all users and manage roles</p>
        </div>
        <div class="btn-group">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-gray">← Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-red">Logout</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td style="color:#999;font-size:13px;">{{ $user->id }}</td>

                <td>
                    <div class="name-cell">
                        <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                        <strong>{{ $user->name }}</strong>
                    </div>
                </td>

                <td style="color:#555;">{{ $user->email }}</td>

                <td style="color:#999;font-size:13px;">
                    {{ $user->created_at->format('M d, Y') }}
                </td>

                <td>
                    <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>

                <td>
                    @if($user->role === 'admin')
                        <form method="POST" action="{{ route('admin.users.role', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="role" value="user">
                            <button class="btn btn-gray btn-sm"
                                onclick="return confirm('Remove admin from {{ $user->name }}?')">
                                Revoke Admin
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.users.role', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="role" value="admin">
                            <button class="btn btn-indigo btn-sm"
                                onclick="return confirm('Make {{ $user->name }} an admin?')">
                                Make Admin
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
