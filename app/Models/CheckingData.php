<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckingData extends Model
{
    use HasFactory;
    protected $fillable = [
        'che_d_id','che_d_format',
    ];
}
