<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class problem_management extends Model
{
    use HasFactory;
    protected $fillable = [
        'prob_m_id','prob_m_way',
    ];
    
}