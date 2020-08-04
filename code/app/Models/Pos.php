<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Pos extends Model
{
    static function getPos(){
        $company=Auth::user()->getCompany();
        if(is_null($company)){
            return null;
        }else{

            return Pos::where('company_id',$company->id)->get();
        }
    }

    static function getPosId($id){
        $company=Auth::user()->getCompany();
        if(is_null($company)){
            return abort(404);
        }else{
            $data=Pos::where('company_id',$company->id)->where('id',$id)->first();
            if(is_null($data))
                abort(404);
            return $data;
        }
    }
}
