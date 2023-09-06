<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'subp_id','subp_type_id','subp_name',
    ];
}
