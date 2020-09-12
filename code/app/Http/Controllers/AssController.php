<?php

namespace App\Http\Controllers;

use App\Models\Ass;
use App\services\AssService;
use Illuminate\Http\Request;

class AssController extends Controller
{

    public function index($group_id=0)
    {
        $datagrs=AssService::listGr();
        $dataass=AssService::listAssGrId($group_id);
        return view('upanel.ass.index',['datagrs'=>$datagrs,'dataass'=>$dataass]);
    }

    public function create(){
        $datagrs=AssService::listGrAll();
        return view('upanel.ass.createass',['datagrs'=>$datagrs]);
    }

    public function story(Request $request){
        AssService::createAss($request);
        return redirect()->route('upaenl.ass');
    }

    public function edit($id){
        //dd($id);
        $data=AssService::dataAssId($id);
        $datagrs=AssService::listGrAll();
        $datasass= AssService::getAllAss();
        return view('upanel.ass.editass',['data'=>$data,'datagrs'=>$datagrs]);
    }

    public function update(Request $request){
        AssService::updateAss($request);
        return redirect()->route('upaenl.ass');
    }

    public function delete($id){
        AssService::deleteAss($id);
        return redirect()->route('upaenl.ass');
    }

    public function getAssId(Request $request){
        $data=AssService::dataAssId($request->input('id'));
        return response()->json($data);
    }

    public function saveDate(Request $request){

        AssService::updateAss($request);
        return 1;
    }



}
