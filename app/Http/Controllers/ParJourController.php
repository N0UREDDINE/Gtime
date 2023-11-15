<?php

namespace App\Http\Controllers;

use App\Models\ParJour;
use App\Models\User;
use Illuminate\Http\Request;

class ParJourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Assuming you are fetching users from the database
    $users = User::all();

    return view('ParJour.ParJour', ['users' => $users]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParJour $parJour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParJour $parJour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParJour $parJour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParJour $parJour)
    {
        //
    }
}
