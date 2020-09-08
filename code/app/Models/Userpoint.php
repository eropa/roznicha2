<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userpoint extends Model
{
    public function Point()
    {
        return $this->belongsTo('App\Models\Point','point_id')->withDefault();
    }
    public function Company()
    {
        return $this->belongsTo('App\Models\Company','company_id')->withDefault();
    }
}
