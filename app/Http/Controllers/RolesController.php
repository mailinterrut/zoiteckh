<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        $role = new Role();
        $role->name = $request->name;
        // Set any other properties of the role

        $role->save();

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id . '|max:255',
        ]);

        $role->name = $request->name;
        // Update any other properties of the role

        $role->save();

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Request $request)
    {
        
        $roleId = $request->input('role_id');

        $role = Role::find($roleId);

        // Check if the role exists
        if ($role) {
            // Retrieve all users with the given role
            $users = User::where('role_id', $roleId)->get();

            // Remove the role association from each user
            foreach ($users as $user) {
                $user->role_id = null;
                $user->save();
            }

            // Delete the role
            $role->delete();

            // Success message
            return redirect()->back()->with('success', 'Role deleted successfully.');
        } else {
            // Role not found
            return redirect()->back()->with('error', 'Role not found.');
        }
 
    }
}

 

 