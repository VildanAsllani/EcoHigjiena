<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    protected $fillable = [
        'title', 'slug', 'text','user_id','image_name','attachment_name','open_until'
    ];

    public function getAttachmentNameAttribute($value)
    {
        if($value != null){
            return $value;
        }
        else{
            return 'empty';
        }
    }
}
