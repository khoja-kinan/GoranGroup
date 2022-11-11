<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class home_slider extends Model
{
    protected $fillable = [
        'slider_title', 'slider_subtitle', 'btn_name','btn_link', 'slider_image','post_id',
    ];

    public function post()
    {
    return $this->hasOne('App\home_slider');
    }
}
