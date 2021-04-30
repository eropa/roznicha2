<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Point;
use App\Models\Pos;
use App\Models\Rasb;
use App\Models\Rash;
use App\Models\Zaivka;
use App\Models\Zaivkabody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZaivkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Zaivka::where('status_zaivka',0)->get();
        return  view('upanel.zaivka.index',["datas" => $datas]);
    }


    public function showzaivka($id)
    {
        $data=Zaivka::find($id);
        if(is_null($data))
            abort(404);
        return  view('upanel.zaivka.show',["data" => $data]);
    }

    public function savezaivka($id){
        $data=Zaivka::find($id);
        if(is_null($data))
            abort(404);
        $pos=Pos::where('default_ras',1)->first();
        if(is_null($pos))
            abort(404);
        $point=Point::query()->first();
        if(is_null($point))
            abort(404);
        $company=Company::query()->first();
        if(is_null($company))
            abort(404);

        $headR=new Rash();
        $headR->user_id=Auth::user()->id;
        $headR->pos_id=$pos->id;
        $headR->point_id=$point->id;
        $headR->company_id=$company->id;
        $headR->status_id=1;
        $headR->zaivka=$id;
        $headR->sum=0;
        $headR->save();
        $i=0;
        $sum=0;
        foreach ($data->bodyzaivka as $item){
            $i++;
            $price=$item->ass->price;
            $bodyR=new Rasb();
            $bodyR->rash_id=$headR->id;
            $bodyR->pos_ass=$i;
            $bodyR->ass_id=$item->ass_id;
            $bodyR->count=$item->count_toval;
            $bodyR->price=$price;
            $bodyR->point_id=$point->id;
            $bodyR->save();
            $sum=$sum+round($price*$item->count_toval,4,2);

        }
        $headR->sum=$sum;
        $headR->save();
        $data=Zaivka::find($id);
        $data->status_zaivka=1;
        $data->save();

        return redirect()->route('upaenl.rasxod');
    }


    public function delete($id){
        Zaivkabody::where('zaivka_id',$id)->delete();
        Zaivka::destroy($id);
        return redirect()->back();
    }

}
