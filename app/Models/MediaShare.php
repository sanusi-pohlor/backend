<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaShare extends Model
{
    use HasFactory;
    protected $fillable = ['title','details','cover_image','video','tag','star','Author','status','link'];
}
