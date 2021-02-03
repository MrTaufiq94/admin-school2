<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    //belongsTo table atau Model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //belongsToMany ke table atau Model Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //change default date view
    public function getCreatedAtAttribute($date)
    {   
        return Carbon::parse($date)->format('d-M-Y');
    }
}
