<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organization extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'org_name',
        'email',
        'password',
        'registration_number',
        'org_type',
    ];

    protected $hidden = [
        'password',
    ];
}
