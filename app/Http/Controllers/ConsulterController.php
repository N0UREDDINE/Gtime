<?php

namespace App\Http\Controllers;

use App\Models\Consulter;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class ConsulterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // If there is a search query, filter the results
        $consulters = $search
            ? Consulter::with('user')
                ->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->get()
            : Consulter::with('user')->get();

        $users = User::all();

        return view('consulter.consulter', ['Consulters' => $consulters, 'Users' => $users]);
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
