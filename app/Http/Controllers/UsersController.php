<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use App\Models\UserPrivilege;



 
class UsersController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $users = User::with('role', 'privilege')->get();
        return view('users.index', compact('users'));
        
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->active = $request->boolean('active')->default(true);
        $user->role_id =1;
        $user->privilege_id = 2;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function activate(User $user)
    {
        $user->active = true;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User activated successfully.');
    }

    public function deactivate(User $user)
    {
        $user->active = false;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User deactivated successfully.');
    }
    
}
