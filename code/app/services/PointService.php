<?php


namespace App\services;


use App\Models\Point;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointService
{
    static function createPoint(Request $request){
        $company=Auth::user()->getCompany();
        $model=new Point();
        $model->name=$request->input('name');
        $model->company_id=$company->id;
        return $model->save();
    }

    static function updatePoint(Request $request){
        $company=Auth::user()->getCompany();
        $data=Point::where('company_id',$company->id)->where('id',$request->input('id'))->first();
        if(is_null($data)){
            return abort(404);
        }
        $model=Point::find($request->input('id'));
        $model->name=$request->input('name');
        $model->company_id=$company->id;
        return $model->save();
    }

    static function destroyPoint($id){
        $company=Auth::user()->getCompany();
        $data=Point::where('company_id',$company->id)->where('id',$id)->first();
        if(is_null($data)){
            return abort(404);
        }
        return Point::destroy($id);
    }


}
