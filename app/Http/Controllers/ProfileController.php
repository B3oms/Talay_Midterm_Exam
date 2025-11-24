<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show profile
    public function show(User $user)
    {
        $tweets = $user->tweets()->latest()->get();
        return view('profile.show', compact('user', 'tweets'));
    }

    // Edit profile
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $user->name = $request->name;

        if ($request->hasFile('avatar')) {
            $avatarName = $user->id.'_avatar'.time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);
            $user->profile->avatar = $avatarName;
            $user->profile->save();
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated.');
    }
}
