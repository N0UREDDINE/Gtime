<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::all();
        return view('time.time', ['times' => $times]);
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
        // Validez les données du formulaire, puis créez une nouvelle entrée
        $request->validate([
            'Login_time' => 'required|date',
            // ... Autres règles de validation ...
        ]);

        $time = new Time();
        $time->Login_time = $request->input('Login_time');
        // Assignez d'autres champs en fonction de votre logique
        $time->save();
        return redirect()->route('time.index')->with('success', 'Time entry created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Time $time)
    {
        // Validez les données du formulaire, puis mettez à jour l'entrée existante
        $request->validate([
            'Login_time' => 'required|date',
            // ... Autres règles de validation ...
        ]);

        $time->Login_time = $request->input('Login_time');
        // Mettez à jour d'autres champs en fonction de votre logique

        $time->save();

        return redirect()->route('time.index')->with('success', 'Time entry updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Time $time)
    {
        // Supprimez l'entrée de la base de données
        $time->delete();

        return redirect()->route('time.index')->with('success', 'Time entry deleted successfully!');
    }
}
