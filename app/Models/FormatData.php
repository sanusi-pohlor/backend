<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatData extends Model
{
    use HasFactory;
    protected $fillable = [
        'fm_d_id','fm_d_name',
    ];
}
