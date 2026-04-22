<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show user profile + pet + orders
    public function index()
    {
        $user = Auth::user();

        // explicitly fetch orders for THIS user (more reliable than load relation)
        $orders = Order::where('user_id', $user->id)
            ->latest()
            ->get();

        return view('pages.profile.index', compact('user', 'orders'));
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

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profile updated!');
    }
}
