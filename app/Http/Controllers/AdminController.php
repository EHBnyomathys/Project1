<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();

        return view('admin.dashboard', compact('users'));
    }

    /**
     * Maak een gebruiker admin.
     */
    public function makeAdmin($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->role = 'admin';
            $user->save();
            return redirect()->back()->with('success', 'Gebruiker is nu een admin.');
        }

        return redirect()->back()->with('error', 'Gebruiker niet gevonden.');
    }

    /**
     * Verwijder adminrechten van een gebruiker.
     */
    public function removeAdmin($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->role = 'user';
            $user->save();
            return redirect()->back()->with('success', 'Adminrechten zijn verwijderd.');
        }

        return redirect()->back()->with('error', 'Gebruiker niet gevonden.');
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Gebruiker succesvol aangemaakt!');
    }
}
