<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class action_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'act_ty_id','act_ty_name',
    ];
    
}