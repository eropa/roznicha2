<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserpaneController extends Controller
{

    /**
     * Список пользователейв
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $datas=User::all();
        return view('upanel.users.index',
                ['datas'=>$datas]);
    }
}
