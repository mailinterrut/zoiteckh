<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $roles = $user->roles;
        // $privileges = $user->privileges;
        $roles = $user->roles ? $user->roles->pluck('name')->toArray() : [];
        $privileges = $user->privileges ? $user->privileges->pluck('name')->toArray() : [];


        return view('dashboard', compact('roles', 'privileges'));
    }
    public function home()
    {
        // $user = Auth::user();
        // $roles = $user->roles;
        // $privileges = $user->privileges;
        // $roles = $user->roles ? $user->roles->pluck('name')->toArray() : [];
        // $privileges = $user->privileges ? $user->privileges->pluck('name')->toArray() : [];


        return view('home');
    }
}
