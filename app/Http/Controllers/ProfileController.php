<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($username)
    {
        $profile = Profile::where('username', $username)->firstOrFail();
        return view('profile.show', compact('profile'));
    }

    public function edit()
    {
        $profile = Auth::user()->profile ?? new Profile();
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'profile_picture' => 'nullable|image|max:2048',
            'about_me' => 'nullable|string'
        ]);

        $user = Auth::user();
        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

        $profile->username = $request->username;
        $profile->birthday = $request->birthday;
        $profile->about_me = $request->about_me;

        if ($request->hasFile('profile_picture')) {
            if ($profile->profile_picture) {
                Storage::delete('public/' . $profile->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $profile->profile_picture = $path;
        }

        $profile->save();

        return redirect()->route('profile.edit')->with('success', 'Profiel bijgewerkt!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
