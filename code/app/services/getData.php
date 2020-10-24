<?php


namespace App\services;


use App\Models\Ass;
use App\Models\Grass;
use App\Models\Point;
use App\Models\Pos;
use App\Models\Prih;
use App\Models\Rash;
use App\Models\Userpoint;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            ->where('asses.sostav',0)
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

    static function getPrixonFound(Request $request){
        $company=Auth::user()->getCompany();
        $datas=Prih::where('company_id',$company->id)
            ->whereDate('dataprixod','>=',Carbon::parse($request->input('data1')))
            ->whereDate('dataprixod','<=',Carbon::parse($request->input('data2')))
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

    static function getPointsRas(){
        $company=Auth::user()->getCompany();
        $data=Point::where('company_id',$company->id)->first();
        if(is_null($data)){
            return abort(404);
        }
        return $data;
    }

    static function getPossRas(){
        $company=Auth::user()->getCompany();
        $data=Pos::where('company_id',$company->id)->where('default_ras',1)->first();
        if(is_null($data)){
            return abort(404);
        }
        return $data;
    }

    static function getAssRasNew(){
        $company=Auth::user()->getCompany();
        $datas=Grass::where('company_id',$company->id)
            ->where('parent_id',0)
            ->where('visible_ras',1)
            ->get();
        if(is_null($datas)){
            return abort(404);
        }
        return $datas;
    }

    static function getAssGr($id){
        $datas=Ass::where('grass_id',$id)->get();
        if(is_null($datas)){
            return abort(404);
        }
        return $datas;
    }

    static function getDataComPoin($user_id){
        $data=Userpoint::where('user_id',$user_id)->first();
        return $data;
    }


    static function geRasxodFound(Request $request){
        $company=Auth::user()->getCompany();
        $datas=Rash::where('company_id',$company->id)
            ->whereDate('created_at','>=',Carbon::parse($request->input('data1')))
            ->whereDate('created_at','<=',Carbon::parse($request->input('data2')))
            ->orderBY('id','desc')
            ->get();
        $array=array();
        foreach($datas as $data){
            $array[]=([
                'id'=>$data->id,
                'date_cr'=>$data->created_at,
                'pos'=>$data->pos->name,
                'point'=>$data->point->name,
                'sum_ras'=>$data->sum,
            ]);
        }
        return $array;
    }


}
