<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Point;
use App\services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Удаление польватея по номеру
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id){
        $this->authorize('is_admin',User::class);
        UserService::destroy($id);
        return redirect()->route('upaenl.users');
    }

    /**
     * Редактирование
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id){
        $this->authorize('is_admin',User::class);
        $data=User::find($id);
        $dataCom=Company::all();
        $dataPoint=Point::all();
        return view('upanel.users.edit',['data'=>$data,'dataCom'=>$dataCom,'dataPoint'=>$dataPoint]);
    }

    /**
     * Обновление данных
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request){
        $this->authorize('is_admin',User::class);
        UserService::update($request);
        return redirect()->route('upaenl.users');
    }


    /**
     * Профиль пользователя
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profil(){
        $data=Auth::user();
        $company=$data->getCompany();
        return view('upanel.profil.index',['data'=>$data,'company'=>$company]);
    }

    public function profilUpdate(Request $request){
        UserService::UpdateProfil($request);
        return redirect()->back();
    }

}
