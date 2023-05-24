<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account.index', compact('user'));
    }

    public function settings()
    {
        $user = Auth::user();
        return view('account.settings', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('account.index')->with('success', 'Account settings updated successfully.');
    }
}
