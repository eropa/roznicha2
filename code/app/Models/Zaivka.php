<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zaivka extends Model
{
    public function bodyzaivka()
    {
        return $this->hasMany('App\Models\Zaivkabody','zaivka_id','id');
    }
}
