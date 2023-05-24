<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use App\Models\UserPrivilege;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::with('role', 'privilege')->get();
        return view('home', compact('users'));
        // return view('home');
    }
}
