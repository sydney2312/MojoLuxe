<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show user profile + pet
    public function index()
    {
        $user = Auth::user()->load('pet'); // load the single pet relationship
        return view('pages.profile.index', compact('user'));
    }

    // Update user info
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->update($validated);

        return redirect()->route('profile.index')->with('success', 'Profile updated!');
    }
}
