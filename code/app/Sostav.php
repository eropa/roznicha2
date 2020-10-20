<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sostav extends Model
{
    public function asstovar()
    {
        return $this->belongsTo('App\Models\Ass','ass_ssos_id','id')->withDefault();
    }
}
