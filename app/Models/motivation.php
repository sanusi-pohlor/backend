<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motivation extends Model
{
    use HasFactory;
    protected $fillable = [
        'moti_id','moti_name',
    ];
    
}