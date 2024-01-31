<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Employee extends User
{
    protected $fillable = [
        'name',
        'designation',
        'contact',
        'address',
        'profile'
    ];
}
