<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_category')->orderBy('id', 'DESC');
    }
}