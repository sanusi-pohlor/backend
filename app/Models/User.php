<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'username',
        'lastName',
        'email',
        'password',
        'phone_number',
        'Id_line',
        'province',
        'receive_ct_email',
        'about',
        'level',
    ];

    protected $hidden = [
        'password'
    ];
}
