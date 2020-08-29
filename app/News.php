<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'slug', 'text','user_id','image_name'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
