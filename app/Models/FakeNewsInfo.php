<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class FakeNewsInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'fn_info_nameid', 'fn_info_head','fn_info_province', 'fn_info_content', 'fn_info_source', 'fn_info_num_mem', 'fn_info_more', 'fn_info_link', 'fn_info_dmy', 'fn_info_image', 'fn_info_vdo','fn_info_status'
    ];
}
