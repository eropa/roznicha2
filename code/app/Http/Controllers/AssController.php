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
        return view('upanel.ass.index',['datagrs'=>$datagrs]);
    }

}
