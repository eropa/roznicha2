<?php


namespace App\services;


use App\Models\Grass;
use App\Models\Point;
use App\Models\Pos;
use App\Models\Prih;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class getData
{
    static function getPoints(){
        $company=Auth::user()->getCompany();
        $data=Point::where('company_id',$company->id)->get();
        if(is_null($data)){
            return abort(404);
        }
        return $data;
    }
    static function getPoss(){
        $company=Auth::user()->getCompany();
        $data=Pos::where('company_id',$company->id)->get();
        if(is_null($data)){
            return abort(404);
        }
        return $data;
    }

    static function getAssFound($text){
        $company=Auth::user()->getCompany();
        $datas = DB::table('grasses')
            ->leftJoin('asses', 'grasses.id', '=', 'asses.grass_id')
            ->select('asses.id', 'asses.name','asses.barcode')
            ->where('grasses.company_id',$company->id)
            ->where('asses.name','LIKE','%'.$text.'%')
            ->get();
        return $datas;
    }

    static function getPrixonToday(){
        $company=Auth::user()->getCompany();
        $datas=Prih::where('company_id',$company->id)
                    ->whereDate('dataprixod','>=',Carbon::parse(date('d-m-Y')))
                    ->orderBY('id','desc')
                    ->get();
        $array=array();
        foreach($datas as $data){
            $array[]=([
                'id'=>$data->id,
                'dataprixod'=>$data->dataprixod,
                'datapay'=>$data->datapay,
                'pos_id'=>$data->pos_id,
                'point_id'=>$data->point_id,
                'pos_name'=>$data->pos->name,
                'point_name'=>$data->point->name,
            ]);
        }
        return $array;
    }
}
