<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'record_date',
        'login_time',
        'delay_time',
        'break_start_time',
        'break_end_time',
        'logout_time',
        'service_time',
        'user_id', // Add the 'user_id' field to the fillable array
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     public function parjour()
    {
        return $this->belongsTo(ParJour::class, 'parjour_id'); // Adjust the foreign key as needed
    }
}
    // Add these accessor methods to calculate derived attributes
//     public function getLogInTimeAttribute()
//     {
//         // Your logic to calculate LogIn_time
//         // Example: assuming login_time is a DateTime field
//         return $this->Login_time->format('H:i:s');
//     }

//     public function getDelayTimeAttribute()
// {
//     // Your logic to calculate Delay_time
//     // Example: assuming login_time and work_time are DateTime fields
//     $loginTime = $this->login_time->diff($this->work_time);
//     return $loginTime->format('%H:%I:%S');
// }


// public function getFullTimeAttribute()
// {
//     // Your logic to calculate Full_time
//     // Example: assuming logout_time, login_time, break_start_time, and break_end_time are DateTime fields
//     $fullTime = $this->logout_time->diff($this->login_time);
    
//     // Calculate the break time difference
//     $breakTime = $this->break_end_time->diff($this->break_start_time);

//     // Calculate the total full time
//     $totalFullTime = $fullTime->diff($breakTime);

//     // Subtract delay time
//     $totalFullTime = $totalFullTime->sub(new \DateInterval($this->delay_time));

//     return $totalFullTime->format('%H:%I:%S');
// }


//     public function getBreakTimeAttribute()
//     {
//         // Your logic to calculate break_time
//         // Example: assuming break_end_time and break_start_time are DateTime fields
//         $breakTime = $this->break_end_time->diff($this->break_start_time);
//         return $breakTime->format('%H:%I:%S');
//     }
