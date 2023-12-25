<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivations extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','moti_name',
    ];
}
