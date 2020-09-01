<?php

namespace App\Http\Controllers;

use App\Models\Prib;
use App\Models\Prih;
use App\services\getData;
use App\services\PrixodService;
use Illuminate\Http\Request;

class PrihController extends Controller
{

    public function index()
    {
        return view('upanel.prixod.index');
    }

    public function create()
    {
        return view('upanel.prixod.create');
    }

    public function getDataCreate(){
        $dataPoint=getData::getPoints();
        return response()->json($dataPoint);
    }

    public function getDataAss(Request $request){
        $dataPoint=getData::getAssFound($request->input('foundText'));
        return response()->json($dataPoint);
    }

    public function setPrixod(Request $request){
       // dump($request->all());
        $prixod=PrixodService::createPrixod($request);
        //return 0;
    }

    public function getPrixod(){
        $datas=getData::getPrixonToday();
        return response()->json($datas);
    }

    public function deletPrixod(Request $request){
       // $body=Prib::where('prih_id',$request->input('prix_id'));
        $head=Prih::destroy($request->input('prix_id'));
        return 1;
    }

}
