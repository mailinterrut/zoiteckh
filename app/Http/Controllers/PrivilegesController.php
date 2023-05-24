<?php
 
namespace App\Http\Controllers;

use App\Models\Privilege;
use Illuminate\Http\Request;

class PrivilegesController extends Controller
{
    public function index()
    {
        $privileges = Privilege::all();

        return view('privileges.index', compact('privileges'));
    }

    public function create()
    {
        return view('privileges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:privileges',
            // Add any other validation rules for the privilege
        ]);

        Privilege::create([
            'name' => $request->name,
            // Add any other columns you want to fill
        ]);

        return redirect()->route('privileges.index')
            ->with('success', 'Privilege created successfully.');
    }

    public function edit(Privilege $privilege)
    {
        
        return view('privileges.edit', compact('privilege'));
    }

    public function update(Request $request, Privilege $privilege)
    {
        $request->validate([
            'name' => 'required|unique:privileges,name,' . $privilege->id,
            // Add any other validation rules for the privilege
        ]);

        $privilege->update([
            'name' => $request->name,
            // Update any other columns you want to modify
        ]);

        return redirect()->route('privileges.index')
            ->with('success', 'Privilege updated successfully.');
    }

    public function destroy(Privilege $privilege)
    {
        $privilege->delete();

        return redirect()->route('privileges.index')
            ->with('success', 'Privilege deleted successfully.');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
 
}
