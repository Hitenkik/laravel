<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class employee extends User
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'phone_no',
        'address',
        'profile'
    ];
}
