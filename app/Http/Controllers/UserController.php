<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adminDashboard()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->role = 'admin';
            $user->save();
        }
        return redirect()->back()->with('success', 'Gebruiker is nu een admin');
    }

    public function removeAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->role = 'user';
            $user->save();
        }
        return redirect()->back()->with('success', 'Adminrechten zijn verwijderd');
    }
    public function index()
    {
        $users = User::with('profile')->get();
        return view('users.index', compact('users'));
    }
}
