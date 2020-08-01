<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Point extends Model
{
    static function getPointId($id){
        $company=Auth::user()->getCompany();
        if(is_null($company)){
            return abort(404);
        }else{
            $data=Point::where('company_id',$company->id)->where('id',$id)->first();
            if(is_null($data))
                abort(404);
            return $data;
        }
    }
}
