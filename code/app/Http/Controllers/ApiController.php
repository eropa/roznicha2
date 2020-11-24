<?php

namespace App\Http\Controllers;

use App\Models\Ass;
use App\Models\Grass;
use App\Models\Zaivka;
use App\Models\Zaivkabody;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getShop(Request $request){
        $arReturn=array();
        $group=Grass::query();
        if($request->input('group_id')>0){
            $group=$group->where('parent_id',$request->input('group_id'));
        }
        $groups=$group->get();
        foreach ($groups as $item){
            $arReturn[]=array(
                'id'=>$item->id,
                'type'=>'group',
                'name'=>$item->name,
                'image'=>$item->image,
                'price'=>0.00,
            );
        }
        $ass_lists=Ass::where('grass_id',$request->input('group_id'))->get();
        foreach ($ass_lists as $ass_list){
            $arReturn[]=array(
                'id'=>$ass_list->id,
                'type'=>'tovar',
                'name'=>$ass_list->name,
                'image'=>$ass_list->image,
                'price'=>$ass_list->price,
            );
        }
        return response()->json($arReturn);
    }


    public function getCateg(Request $request){
        $datas=Grass::where('parent_id',0)->get();
        $arReturn=array();
        foreach ($datas as $data){
            $arReturn[]=array(
                'id'=>$data->id,
                'name'=>$data->name,
            );
        }
        return response()->json($arReturn);
    }


    public  function setZaivka(Request $request){
        /* "datazaivka" => json_encode($datas),
            "user_id"=>$user->id,
            "comment"=>"-------"
        */
        $datas=$request->input('datazaivka');
        $datas=json_decode($datas);
        $user_id=$request->input('user_id');
        $comment=$request->input('comment');

        /**
         * Шапка заявки
         */
        $head=new Zaivka();
        $head->user_id=$user_id;
        $head->comment_zaivka=$comment;
        $head->save();

        /*
         * тело заявки
         */
        foreach ($datas as $item){
            $body=new Zaivkabody();
            $body->ass_id=$item->id;
            $body->count_toval=$item->counttovar;
            $body->zaivka_id= $head->id;
            $body->save();
        }

        return $head->id;
    }

}
