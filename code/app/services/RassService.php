<?php


namespace App\services;


use App\Models\Rasb;
use App\Models\Rash;
use App\Models\Rassostav;
use App\Sostav;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RassService
{
    static function create(Request $request){
        $pos=$request->input('selectPos');
        $point=$request->input('selectSklad');
        $listrasxod=$request->input('listrasxod');
        $user=Auth::user();
        $company=Auth::user()->getCompany();
        $sum=0;
        $posRas=0;
        $modelR=new Rash();
        $modelR->user_id=$user->id;
        $modelR->pos_id=$pos['id'];
        $modelR->point_id=$point['id'];
        $modelR->company_id=$company->id;
        $modelR->sum=0;
        $modelR->save();
        foreach ($listrasxod as $item){
            $posRas++;
            $modelB=new Rasb();
            $modelB->rash_id=$modelR->id;
            $modelB->pos_ass=$posRas;
            $modelB->ass_id=$item['id'];
            $modelB->count=$item['count'];
            $modelB->price=$item['price'];
            $modelB->point_id=(int)$point;
            $sum=$sum+$item['sum'];
            $modelB->save();

            // Списываем составной товар
            $is_sostav=Sostav::where('ass_id',$item['id'])->count();
            if($is_sostav){
                $sostav=Sostav::where('ass_id',$item['id'])->get();
                foreach ($sostav as $itemsostav){
                    $modelRasSostav=new Rassostav();
                    $modelRasSostav->ras_id=$modelR->id;
                    $modelRasSostav->ras_pos=$posRas;
                    $modelRasSostav->ass_id=$itemsostav->ass_ssos_id;
                    $modelRasSostav->count_ras=$item['count']*$itemsostav->count;
                    $modelRasSostav->count_porchi=$item['count'];
                    $modelRasSostav->point_id=(int)$point;
                    $modelRasSostav->save();
                }
            }else{
                $modelRasSostav=new Rassostav();
                $modelRasSostav->ras_id=$modelR->id;
                $modelRasSostav->ras_pos=$posRas;
                $modelRasSostav->ass_id=$item['id'];
                $modelRasSostav->count_ras=$item['count'];
                $modelRasSostav->count_porchi=$item['count'];
                $modelRasSostav->point_id=(int)$point;
                $modelRasSostav->save();
            }
        }
        $modelR->sum=$sum;
        $modelR->save();
    }

    static function selectToday(){
        $user=Auth::user();
        $datas=Rash::whereDate('created_at',Carbon::today())->orderBy('id','desc');
        if($user->role=="kassir"){
            $datas=$datas->where('user_id',$user->id);
        }
        $datas=$datas->get();
        $arrayRetur=array();
        foreach ($datas as $data){
            $arrayRetur[]=([
                'id'=>$data->id,
                'date_cr'=>date_format($data->created_at, 'Y-m-d H:i:s'),
                'pos'=>$data->pos->name,
                'point'=>$data->point->name,
                'sum_ras'=>$data->sum,
            ]);
        }
        return $arrayRetur;
    }
}
