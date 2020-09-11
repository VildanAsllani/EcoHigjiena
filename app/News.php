<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;
use Carbon\Carbon;

class News extends Model
{
    protected $fillable = [
        'title', 'slug', 'text','user_id','image_name'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function comments(){
        return $this->hasMany('App\Comments');
        // return $this->hasMany('App\Comments')->paginate(1);
    }
    public function confirmedComments(){
        return $this->comments()->where('confirmed',1);
    }
    public function notConfirmedComments(){
        return $this->comments()->where('confirmed',0);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
