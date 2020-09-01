<?php


namespace App\services;


use App\Models\Prib;
use App\Models\Prih;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrixodService
{
    static function createPrixod(Request $request){
        $company=Auth::user()->getCompany();
        $user=Auth::user();

        $model=new Prih();
        $model->dataprixod=Carbon::now();
        $model->user_id=$user->id;
        $model->pos_id=$request->input('selectPos');
        $model->point_id=$request->input('selectSklad');
        $model->str_rasxod=$request->input('strRas');
        $model->company_id=$company->id;
        if($request->input('setOplata')){
            $model->datapay=Carbon::now();
        }

        $model->save();
        $datas=$request->input('prixodToavar');
        foreach ($datas as $data){
            $modelBody=new Prib();
            $modelBody->prih_id=$model->id;
            $modelBody->pos_ass=$data['pos'];
            $modelBody->ass_id=$data['id'];
            $modelBody->count=$data['counttovar'];
            $modelBody->ostatok=$data['counttovar'];
            $modelBody->price_zak=$data['zakryb'];
            $modelBody->price_prod=$data['prodryb'];
            $modelBody->save();
        }
        return $model->id;

    }
}
