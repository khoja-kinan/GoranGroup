<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = [
        'company_name', 'section_id', 'bio','phone', 'whatsapp_num','address','email','location','facebook_link','instagram_link','linkedin_link','youtube_link','background_image', 'logo',
    ];

    public function section()
    {
    return $this->belongsTo('App\section');
    }

    public function file()
    {
    return $this->hasOne('App\file');
    }

    public function image()
    {
    return $this->hasMany('App\img');
    }

}
