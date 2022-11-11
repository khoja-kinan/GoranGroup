<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class img extends Model
{
    protected $fillable = [
        'company_id', 'path', 'company_name',
    ];

    public function company()
    {
    return $this->belongsTo('App\company');
    }
}
