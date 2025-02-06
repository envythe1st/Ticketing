<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    //HOME
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    //EDIT & UPDATE
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            abort(500, 'User not found or invalid model');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
            $user->photo = $photoPath;
        }

        $user->name = $request->name;
        $user->bio = $request->bio;

        if (!$user->save()) {
            abort(500, 'Failed to update profile');
        }

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
