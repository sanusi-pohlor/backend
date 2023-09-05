<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checking_data extends Model
{
    use HasFactory;
    protected $fillable = [
        'che_d_id','che_d_format',
    ];
    
}