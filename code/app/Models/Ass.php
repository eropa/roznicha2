<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ass extends Model
{
    //
    public function group()
    {
        return $this->belongsTo('App\Models\Grass','grass_id')->withDefault();
    }
}
