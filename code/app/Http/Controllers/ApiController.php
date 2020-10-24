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
            );
        }
        $ass_lists=Ass::where('grass_id',$request->input('group_id'))->get();
        foreach ($ass_lists as $ass_list){
            $arReturn[]=array(
                'id'=>$ass_list->id,
                'type'=>'tovar',
                'name'=>$ass_list->name,
                'image'=>$ass_list->image,
            );
        }
        return response()->json($arReturn);
    }
}
