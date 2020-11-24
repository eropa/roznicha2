<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rasb extends Model
{
    public function ass()
    {
        return $this->belongsTo('App\Models\Ass', 'ass_id','id')->withDefault();
    }
}
