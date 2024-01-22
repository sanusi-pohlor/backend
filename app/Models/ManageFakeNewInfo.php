<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageFakeNewInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'mfi_time',
        'mfi_province',
        'mfi_mem',
        'mfi_med_c',
        'mfi_img',
        'mfi_link',
        'mfi_c_info',
        'mfi_num_mem',
        'mfi_agency',
        'mfi_d_topic',
        'mfi_fm_d',
        'mfi_dis_c',
        'mfi_publ',
        'mfi_ty_info',
        'mfi_only_cv',
        'mfi_con_about',
        'mfi_moti',
        'mfi_iteration',
        'mfi_che_d',
        'mfi_data_cha',
        'mfi_fninfo',
        'mfi_results',
        'mfi_tag',
    ];
}
