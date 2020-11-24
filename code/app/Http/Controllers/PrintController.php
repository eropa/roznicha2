<?php

namespace App\Http\Controllers;

use App\Models\Prih;
use App\Models\Rash;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print_ras($id){
        $data=Rash::find($id);
        if(is_null($data)){
            abort(404);
        }
        return view('upanel.print.ras_print', ["data" => $data]);
    }

    public function print_pri($id){
        $data=Prih::find($id);
        if(is_null($data)){
            abort(404);
        }
        return view('upanel.print.pri_print', ["data" => $data]);
    }

}
