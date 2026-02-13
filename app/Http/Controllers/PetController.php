<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    // Store a new pet
    public function store(Request $request)
    {
        $user = Auth::user();

        // Prevent multiple pets
        if ($user->pet) {
            return redirect()->route('profile.index')
                ->with('error', 'You already have a pet profile.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'breed' => 'nullable|string|max:100',
            'age' => 'nullable|integer|min:0',
            'personality' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $pet = new Pet($validated);
        $pet->user_id = $user->id;

        // Upload avatar if exists
        if ($request->hasFile('avatar')) {
            $pet->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $pet->save();

        return redirect()->route('profile.index')->with('success', 'Pet created successfully!');
    }

    // Update existing pet
    public function update(Request $request, Pet $pet)
    {
        // Ensure user owns the pet
        if ($pet->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'breed' => 'nullable|string|max:100',
            'age' => 'nullable|integer|min:0',
            'personality' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $pet->fill($validated);

        // Replace avatar if uploaded
        if ($request->hasFile('avatar')) {
            if ($pet->avatar) {
                Storage::disk('public')->delete($pet->avatar);
            }
            $pet->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        $pet->save();

        return redirect()->route('profile.index')->with('success', 'Pet updated successfully!');
    }
}
