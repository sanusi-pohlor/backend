<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'image'];
    protected $appends = ['id']; // Add this line

    // Mutator to automatically generate the formatted ID
    public function getFormattedIdAttribute()
    {
        return 'N' . str_pad($this->id, 2, '0', STR_PAD_LEFT);
    }
}