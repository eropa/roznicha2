<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prih extends Model
{
    public function pos()
    {
        return $this->belongsTo('App\Models\Pos','pos_id')->withDefault();
    }
    public function point()
    {
        return $this->belongsTo('App\Models\Point','point_id')->withDefault();
    }
    public function bodypri()
    {
        return $this->hasMany('App\Models\Prib','prih_id','id');
    }
}
