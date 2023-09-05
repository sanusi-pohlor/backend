<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_characteristics extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_cha_id','data_cha_name',
    ];
    
}