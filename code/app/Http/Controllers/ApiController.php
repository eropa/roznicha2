<?php

namespace App\Http\Controllers;

use App\Models\Ass;
use App\Models\Grass;
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
}
