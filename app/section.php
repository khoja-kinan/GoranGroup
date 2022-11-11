<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    public function companies()
    {
        return $this->hasMany('App\company');
    }
}
