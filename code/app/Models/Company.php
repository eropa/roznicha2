<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    static function getPoints(){
        $company=Auth::user()->getCompany();
        if(is_null($company)){
            return null;
        }else{
            return Point::where('company_id',$company->id)->get();
        }
    }

}
