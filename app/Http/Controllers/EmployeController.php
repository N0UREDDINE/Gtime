<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $employes = employe::all();
    //     return view('employe.ListerEmployes', ['employes' => $employes]);
    // }
    public function index()
    {
        $employes = Employe::join('roles', 'employes.role_id', '=', 'roles.id')
            ->select('employes.*', 'roles.role')
            ->get();

        return view('employe.ListerEmployes', ['employes' => $employes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('employe.AjouterEmploye', ['roles' => $roles]);
    }
    // public function create()
//     {
//         return view('employe.AjouterEmploye');
//     }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newEmploye = Employe::create([
            'name' => $request->Name,
            'email' => $request->Email,
            'phone' => $request->Phone,
            'password' => $request->Password,
            'role_id' => $request->Role, // Assuming role_id is the correct column name
        ]);
        

        session()->flash('success', 'Employe added successfully.');
        return redirect('/employe');
    }


    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
{
    $roles = Role::all();

    return view('employe.EditEmploye', [
        'employe' => $employe,
        'roles' => $roles, // Pass the $roles variable to the view
    ]);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employe $employe)
{
    $employe->update([
        'name' => $request->Name,
        'email' => $request->Email,
        'phone' => $request->Phone,
        'role_id' => $request->Role, // Assuming 'role_id' is the foreign key in the employes table
    ]);

    session()->flash('success', 'Employe updated successfully.');
    return redirect('/employe');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        session()->flash('success', 'Employe deleted successfully.');
        return redirect('/employe');
    }
}
