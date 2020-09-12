<?php


namespace App\services;


use App\Models\Rasb;
use App\Models\Rash;
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
            $sum=$sum+$item['sum'];
            $modelB->save();
        }
        $modelR->sum=$sum;
        $modelR->save();
    }
}
