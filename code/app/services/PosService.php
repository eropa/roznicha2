<?php


namespace App\services;


use App\Models\Pos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosService
{
    static function createPos(Request $request){
        $company=Auth::user()->getCompany();
        $model=new Pos();
        $model->name=$request->input('name');
        $model->company_id=$company->id;
        return $model->save();
    }

    static function updatePos(Request $request){
        $company=Auth::user()->getCompany();
        $data=Pos::where('company_id',$company->id)->where('id',$request->input('id'))->first();
        if(is_null($data)){
            return abort(404);
        }
        $model=Pos::find($request->input('id'));
        $model->name=$request->input('name');
        $model->company_id=$company->id;
        return $model->save();
    }

    static function destroyPos($id){
        $company=Auth::user()->getCompany();
        $data=Pos::where('company_id',$company->id)->where('id',$id)->first();
        if(is_null($data)){
            return abort(404);
        }
        return Pos::destroy($id);
    }


}
