<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;
use Carbon\Carbon;

class Comments extends Model
{
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
