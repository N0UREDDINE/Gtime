<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParJour extends Model
{
    use HasFactory;

    //protected $fillable = ['user_id', 'time_id','record_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function time()
    {
        return $this->belongsTo(Time::class, 'time_id');
    }
}