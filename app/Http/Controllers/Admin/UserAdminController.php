<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN: USER LIST
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users.index', compact('users'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: UPDATE USER ROLE
    |--------------------------------------------------------------------------
    */
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,admin',
        ]);

        // Prevent self role change (Auth-style consistency)
        $current_user_id = Auth::check() ? Auth::id() : null;

        if ($current_user_id && $user->id === $current_user_id) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $user->role = $request->role;
        $user->save();

        $label = $request->role === 'admin'
            ? 'promoted to admin'
            : 'reverted to user';

        return back()->with('success', "{$user->name} has been {$label}.");
    }
}
