<?php

namespace App\Http\Controllers;

use App\Models\Consulter;
use Illuminate\Http\Request;

class ConsulterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$Consulter = Consulter::all();
        return view('consulter.consulter');
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
    public function show(Consulter $consulter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulter $consulter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulter $consulter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulter $consulter)
    {
        //
    }
}
