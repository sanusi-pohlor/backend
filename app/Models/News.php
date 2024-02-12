<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = ['Author','title','cover_image','details','details_image','video','tag','star','Author','status','link','type_new','med_new','prov_new','key_new','created_at'];
}