<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaChannels extends Model
{
    use HasFactory;
    protected $fillable = [
        'med_c_id','med_c_name',
    ];
}
