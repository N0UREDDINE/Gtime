<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::all();
        $user = auth()->user();
        $loginDate = $user->created_at;
        $serviceHours = $this->calculateServiceHours($loginDate);
        $lateArrival = $this->calculateLateArrival($loginDate);

        return view('time.time', compact('times', 'user', 'loginDate', 'serviceHours', 'lateArrival'));
    }

    /**
     * ... (Other CRUD methods remain unchanged) ...

    /**
     * Additional method for calculating service hours.
     */
    private function calculateServiceHours($loginDate)
    {
        $loginTime = Carbon::parse($loginDate);
        $workStartTime = Carbon::parse('08:30:00');

        return $loginTime->diffAsCarbonInterval($workStartTime)->format('%H:%I:%S');
    }

    /**
     * Additional method for calculating late arrival.
     */
    private function calculateLateArrival($loginDate)
    {
        $loginTime = Carbon::parse($loginDate);
        $workStartTime = Carbon::parse('08:30:00');

        return $loginTime->diffInMinutes($workStartTime) > 0 ? $loginTime->diff($workStartTime)->format('%H:%I:%S') : '00:00:00';
    }

    

}