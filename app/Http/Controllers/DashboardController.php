<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::check() ? Auth::user()->name : 'Gast';
        return view('dashboard', compact('user'));
    }
}
