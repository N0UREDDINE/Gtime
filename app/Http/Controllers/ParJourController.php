<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ParJour;
use App\Models\User;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParJourController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index(Request $request)
     {
         $dt = $request->input('dt', Carbon::now()->format('Y-m-d'));
     
         // Validate the date format if needed
         $request->validate([
             'dt' => 'date_format:Y-m-d',
         ]);
     
         // Fetch records based on the date using Eloquent ORM
         $parjours = Time::with(['user', 'parjour'])->whereDate('record_date', $dt)->get();
     
         return view('ParJour.ParJour', compact('dt', 'parjours'));
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
