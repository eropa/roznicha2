<?php

namespace App\Http\Controllers;

use App\Models\Ass;
use App\Models\Grass;
use App\services\AssService;
use Illuminate\Http\Request;

class GrassController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datagrs=AssService::listGrAll();
        return view('upanel.ass.creategroup',['datagrs'=>$datagrs]);
       // return  view('upanel.ass.creategroup');
    }

    public function story(Request $request){
        AssService::createGr($request);
        return redirect()->route('upaenl.ass');
    }

    public function showassgr($id){
        $datagrs=AssService::listGrID($id);
        $dataParGr=AssService::getGrParentId($id);
        $dataass=AssService::listAssGrId($id);
        //dump($dataParGr);
        return view('upanel.ass.showassgr',['datagrs'=>$datagrs,
            'dataParGr'=>$dataParGr,
            'dataass'=>$dataass]);
    }

    public function editgr($id){
        $data=AssService::getDataGr($id);
        $dataParGr=AssService::listGrAll();
        return view('upanel.ass.editgr',['data'=>$data,'datagrs'=>$dataParGr]);
    }

    public function updategr(Request $request){
        AssService::updateGr($request);
        return redirect()->route('upaenl.ass');
    }

    public function delete($id){
        AssService::deleteGr($id);
        return redirect()->route('upaenl.ass');
    }

}
