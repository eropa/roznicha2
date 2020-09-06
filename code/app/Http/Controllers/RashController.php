<?php

namespace App\Http\Controllers;

use App\Models\Rash;
use App\services\getData;
use Illuminate\Http\Request;

class RashController extends Controller
{

    public function index()
    {
        return  view('upanel.ras.index');
    }


    public function create()
    {
        return  view('upanel.ras.create');
    }

    public function getRasass(Request $request){
        $id=$request->input('id');
        $datas=getData::getAssGr($id);
        return response()->json($datas);
    }

    public function getRasassMain(){
        $datas=getData::getAssRasNew();
        return response()->json($datas);
    }



}
