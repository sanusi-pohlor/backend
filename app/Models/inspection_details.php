<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inspection_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'ins_dt_id','ins_dt_che_id','ins_dt_info_id','ins_dt_date','ins_dt_more'
    ];
    
}