<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $roles = Role::all();
    return view('role.ListerRole', ['roles' => $roles]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.AjouterRole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $newRole = Role::create([
        'role' => $request->Role, // Change 'Role' to 'role'
    ]);

    session()->flash('success', 'Role added successfully.');

    return redirect('/role');
}


    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {
        return view('role.EditRole', [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, role $role)
    {
        $role->update([
            'Role' => $request->role,
        ]);
        session()->flash('success', 'ROLE updated successfully.');
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(role $role)
    {
        $role->delete();
        session()->flash('success', 'Role deleted successfully.');
        return redirect('/role');

    }
}
