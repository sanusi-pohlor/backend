<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','username', 'lastName', 'email', 'password', 'phone_number', 'Id_line', 'province',
    ];
    
}
