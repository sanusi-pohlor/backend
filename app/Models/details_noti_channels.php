<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class details_noti_channels extends Model
{
    use HasFactory;
    protected $fillable = [
        'dnc_id','dnc_med_id','dnc_info_id','dnc_pub_id','dnc_fm_d_id','dnc_prob_id','dnc_scop_pub','dnc_num_mem_med','dnc_date_med','dnc_capt','dnc_link'
    ];
    
}