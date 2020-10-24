<?php

namespace App\Http\Controllers;

use App\Models\Ass;
use App\Models\Prib;
use App\Models\Rassostav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function get_ostatok(){
        return view('upanel.report.index');
    }

    public function post_ostatok(Request $request){
        $aReturn=array();
        $assList=Ass::query()->orderBy('grass_id')->get();
        foreach ($assList as $item){
            $prixod=$this->prixod_tovara($item->id,1);
            $rasxod=$this->rasxod_tovara($item->id,1);
            $aReturn[]=array(
               'ass_id'=>$item->id,
               'ass_name'=>$item->name,
               'ass_group'=>$item->group->name,
               'prixod'=>round($prixod,3),
               'rasxod'=>round($rasxod,3),
               'ostatok'=>round($prixod-$rasxod,3),
            );
        }
        return response()->json($aReturn);
    }

    protected function prixod_tovara($id,$sklad){
        $sum=Prib::where('ass_id',$id)->where('point_id',$sklad)->sum('count');
        return $sum;
    }

    protected function rasxod_tovara($id,$sklad){
        $sum=Rassostav::where('ass_id',$id)->where('point_id',$sklad)->sum('count_ras');
        return $sum;
    }


}
