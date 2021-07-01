<?php


namespace App\services;


use App\Models\Client;
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





        if($request->input('clientPhone')==""){
            $idClient=0;
        }else{
            $dataClinet=Client::where('phone',$request->input('clientPhone'))->first();
            if(is_null($dataClinet)){
                $dataClinet=new Client();
                $dataClinet->name='-';
                $dataClinet->phone=$request->input('clientPhone');
                $dataClinet->email='-';
                $dataClinet->save();
            }
            $idClient=$dataClinet->id;
        }



        $pos=$request->input('selectPos');
        $point=$request->input('selectSklad');
        $listrasxod=$request->input('listrasxod');
        $skidka=$request->input('skidka');
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
        $modelR->client=$idClient;
        $modelR->save();
        foreach ($listrasxod as $item){
            $posRas++;
            $modelB=new Rasb();
            $modelB->rash_id=$modelR->id;
            $modelB->pos_ass=$posRas;
            $modelB->ass_id=$item['id'];
            $modelB->count=$item['count'];
            if($skidka>0){
                $modelB->price=$item['price']-($item['price']*($skidka/100));
                $sum=$sum+($item['sum']-($item['sum']*($skidka/100)));
            }else{
                $modelB->price=$item['price'];
                $sum=$sum+$item['sum'];
            }

            $modelB->point_id=(int)$point;



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

        $totalSum=0;
        if($idClient>0){
            $ras=Rash::where('client',$idClient)->get();
            $dbClient=Client::find($idClient);
            foreach ($ras as $itemRas){
                $totalSum=$totalSum+ $itemRas->sum;
            }
            $procent=0;
            if($totalSum>=100){
                $procent=1;
            }
            if($totalSum>=200){
                $procent=2;
            }
            if($totalSum>=300){
                $procent=3;
            }
            if($totalSum>=400){
                $procent=4;
            }
            if($totalSum>=500){
                $procent=5;
            }
            if($procent>$dbClient->skidka){
                $dbClient->skidka=$procent;
                $dbClient->save();
            }
        }
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
                'status_id'=>($data->status_id==99?"Касса":$data->status->name),
                'zaivka'=>$data->zaivka,
                'sum_ras'=>$data->sum,
            ]);
        }
        return $arrayRetur;
    }
}
