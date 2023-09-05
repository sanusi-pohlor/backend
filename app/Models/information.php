<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;
    protected $fillable = [
        'info_id','info_subp_id','info_vol_mem_id','info_moti_id','info_act_id','info_d_c_id','info_det_cont','info_num_rep','info_date','info_status','info_cont_topic'
    ];
    
}