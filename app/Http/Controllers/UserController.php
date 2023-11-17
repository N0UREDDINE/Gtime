<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $users = User::join('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.role')
        ->get();
    // $users = User::all();
    return view('user.ListerUsers', ['users' => $users]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.AjouterUser', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newUser = User::create([
            'name' => $request->Name,
            'email' => $request->Email,
            'phone' => $request->Phone,
            'password' => $request->Password,
            'role_id' => $request->Role, // Assuming role_id is the correct column name
        ]);
        

        session()->flash('success', 'Employe added successfully.');
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
{
    $roles = Role::all();

    return view('user.EditUser', [
        'user' => $user,
        'roles' => $roles, // Pass the $roles variable to the view
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $user->update([
        'name' => $request->Name,
        'email' => $request->Email,
        'phone' => $request->Phone,
        'role_id' => $request->Role, // Assuming 'role_id' is the foreign key in the employes table
    ]);

    session()->flash('success', 'Employe updated successfully.');
    return redirect('/user');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'Employe deleted successfully.');
        return redirect('/user');
    }
}
