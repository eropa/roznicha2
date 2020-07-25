<?php

namespace App\Http\Controllers;

use App\services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserpaneController extends Controller
{

    /**
     * Список пользователейв
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $this->authorize('is_admin',User::class);
        $datas=User::all();
        return view('upanel.users.index',
                ['datas'=>$datas]);
    }

    /**
     * Форма для создания нового пользователя
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $this->authorize('is_admin',User::class);
        return view('upanel.users.create');
    }

    /**
     * Добавление новой записи
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $this->authorize('is_admin',User::class);
        UserService::create($request);
        return redirect()->route('upaenl.users');
    }

    /**
     * Удаление записи по номеру
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $this->authorize('is_admin',User::class);
        UserService::destroy($id);
        return redirect()->route('upaenl.users');
    }

    public function edit($id){
        $this->authorize('is_admin',User::class);
        $data=User::find($id);
        return view('upanel.users.edit',['data'=>$data]);
    }

    public function update(Request $request){
        $this->authorize('is_admin',User::class);
        UserService::update($request);
        return redirect()->route('upaenl.users');
    }

}
