<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $datas=Client::all();
        return view('upanel.client.indextest',['datas'=>$datas]);
    }

    public function create(){
        return view('upanel.client.create');
    }

    public function store(Request $request){
        $model=new Client();
        $model->name=$request->input('name');
        $model->phone=$request->input('phone');
        $model->email=$request->input('email');
        $model->save();
        return redirect()->route('upaenl.clients');
    }

    public function update(Request $request){
        $model=Client::find($request->input('id'));
        $model->name=$request->input('name');
        $model->phone=$request->input('phone');
        $model->email=$request->input('email');
        $model->save();
        return redirect()->route('upaenl.clients');
    }


    public function delete($id){
        Client::destroy($id);
        return redirect()->route('upaenl.clients');
    }

    public function edit($id){
        $datas=Client::find($id);
        return view('upanel.client.edit',['datas'=>$datas]);
    }
}

