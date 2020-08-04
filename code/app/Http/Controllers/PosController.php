<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\services\PosService;
use Illuminate\Http\Request;

class PosController extends Controller
{

    public function index()
    {
        $datas=Pos::getPos();
        return view('upanel.pos.index',['datas'=>$datas]);
    }


    public function create()
    {
        return view('upanel.pos.create');
    }


    public function store(Request $request)
    {
        PosService::createPos($request);
        return  redirect()->route('upaenl.pos');
    }

    public function edit($id){
        $data=Pos::getPosId($id);
        return view('upanel.pos.edit',['data'=>$data]);
    }

    public function update(Request $request){
        PosService::updatePos($request);
        return  redirect()->route('upaenl.pos');
    }

    public function destroy($id){
        PosService::destroyPos($id);
        return  redirect()->route('upaenl.pos');
    }


}
