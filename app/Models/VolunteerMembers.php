<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerMembers extends Model
{
    use HasFactory;
    protected $fillable = [
        'vol_mem_id', 'vol_mem_fname', 'vol_mem_lname', 'vol_mem_address', 'vol_mem_province', 'vol_mem_ph_num', 'vol_mem_email','vol_mem_get_news',
    ];
}
