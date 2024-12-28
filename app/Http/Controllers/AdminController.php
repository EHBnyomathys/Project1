<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
