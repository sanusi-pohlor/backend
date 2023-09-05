<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_information extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_info_id','type_info_name',
    ];
    
}
