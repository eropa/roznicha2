<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rash extends Model
{
    public function pos()
    {
        return $this->belongsTo('App\Models\Pos','pos_id')->withDefault();
    }
    public function point()
    {
        return $this->belongsTo('App\Models\Point', 'point_id')->withDefault();
    }
    public function bodyras()
    {
        return $this->hasMany('App\Models\Rasb','rash_id','id');
    }
}
