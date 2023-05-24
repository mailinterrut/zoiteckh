<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; 
use App\Models\User;  
use App\Models\UserPrivilege;
use App\Models\Role; 
use App\Models\Privilege;

class ProfileController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::with('role', 'privilege')->get();
        return view('profile.index', compact('users'));
        
    }
    
    public function edit()
    {
        
        $user = Auth::user();
        $roles = Role::all(); 
        
        return view('profile.edit', compact('user','roles'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
