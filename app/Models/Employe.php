<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "password",
        "role_id",
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
