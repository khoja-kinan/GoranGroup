<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'header_title','header_image','post_title','post_body',
    ];

    public function image()
    {
    return $this->hasMany('App\post_images');
    }

    public function slider()
    {
    return $this->belongsTo('App\home_slider');
    }
}
