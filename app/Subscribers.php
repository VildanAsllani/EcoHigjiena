<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscribers extends Model
{
    protected $fillable = [
        'email','confirmed'
    ];

    public function getConfirmedAttribute($value){
        if($value===0){
            return 'Not confirmed';
        }
        else{
            return 'Confirmed';
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
