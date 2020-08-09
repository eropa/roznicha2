<?php


namespace App\services;


use App\Models\Grass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssService
{
    /**
     * Добовляем группу товара
     * @param Request $request
     * @return bool
     */
    static function createGr(Request $request){
        $company=Auth::user()->getCompany();
        $modelGr=new Grass();
        $modelGr->name=$request->input('name');
        $modelGr->parent_id=$request->input('parent_id');
        $modelGr->company_id=$company->id;
        return $modelGr->save();
    }

    static function updateGr(Request $request){
        $company=Auth::user()->getCompany();
        $dataGr=Grass::where('company_id',$company->id)
            ->where('id',$request->input('id'))
            ->first();
        if(is_null($dataGr)){
            abort(404);
        }
        $modelGr=Grass::find($request->input('id'));
        $modelGr->name=$request->input('name');
        $modelGr->parent_id=$request->input('parent_id');
        $modelGr->company_id=$company->id;
        return $modelGr->save();
    }

    static function deleteGr($id){
        $company=Auth::user()->getCompany();
        $dataGr=Grass::where('company_id',$company->id)
            ->where('id',$id)
            ->first();
        if(is_null($dataGr)){
            abort(404);
        }
        return Grass::destroy($id);
    }


    static function listGrAll(){
        $company=Auth::user()->getCompany();
        $datas=Grass::where('company_id',$company->id)
            ->get();
        return $datas;
    }

    static function listGr(){
        $company=Auth::user()->getCompany();
        $datas=Grass::where('company_id',$company->id)
                ->where('parent_id',0)
                ->get();
        return $datas;
    }

    static function listGrID($id){
        $company=Auth::user()->getCompany();
        $datas=Grass::where('company_id',$company->id)
            ->where('parent_id',$id)
            ->get();
        return $datas;
    }

    static function getGrParentId($id){
        $company=Auth::user()->getCompany();
        $dataGrParent=Grass::where('company_id',$company->id)
            ->where('id',$id)
            ->first();
        return $dataGrParent;
    }

    static function getDataGr($id){
        $company=Auth::user()->getCompany();
        $data=Grass::where('company_id',$company->id)
            ->where('id',$id)
            ->first();
        if(is_null($data)){
            abort(404);
        }
        return $data;
    }

}
