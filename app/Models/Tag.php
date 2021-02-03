<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //use HasFactory;
    protected $guarded = [];

    //belongsToMany ke table atau Model Post
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
