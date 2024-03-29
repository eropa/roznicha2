<?php

namespace App\Http\Controllers;

use App\Models\Rash;
use App\Models\Status;
use App\services\getData;
use App\services\RassService;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RashController extends Controller
{

    public function index()
    {
        $kassir=(Auth::user()->role=="kassir"?1:0);
        return  view('upanel.ras.index',['kassir'=>$kassir]);
    }


    public function create()
    {
        return  view('upanel.ras.create');
    }

    public function getRasass(Request $request){
        $id=$request->input('id');
        $datas=getData::getAssGr($id);
        $datagr=getData::getAssGrid($id);
        return response()->json(['asstovar'=>$datas,'datagr'=>$datagr]);
    }

    public function getRasassMain(){
        $datas=getData::getAssRasNew();
        return response()->json($datas);
    }

    public function addrasxod(Request $request){
        RassService::create($request);
        return 1;
    }

    public function getToday(){
        $datas=RassService::selectToday();
        return response()->json($datas);
    }

    public function getFound(Request $request){
        $datas=getData::geRasxodFound($request);
        return response()->json($datas);
    }


    public function changestatus(Request $request){
        $a=$request->all();
        $status=Status::where('name',$request->input('status'))->first();
        if(is_null($status))
            return 1;
        $ras=Rash::find($request->input('idrecord'));
        $ras->status_id=$status->id;
        $ras->save();
        return 1;
    }



    public function skidka(Request $request){
        $clientPhone=$request->input('clientPhone');
        $client=\App\Models\Client::where('phone',$clientPhone)->first();
        if(is_null($client))
            return 0;
        return $client->skidka;
    }
}
