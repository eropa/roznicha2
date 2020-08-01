<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Point;
use App\services\PointService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\AbstractList;

class PointController extends Controller
{
    /**
     * Торговые точки компании
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $points=Company::getPoints();
        return view('upanel.point.index',['points'=>$points]);
    }

    /**
     * Форма создания
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('upanel.point.create');
    }

    /**
     * Операция добавление новой записи
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        PointService::createPoint($request);
        return redirect()->route('upaenl.point');
    }

    /**
     * Редактирование
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $data=Point::getPointId($id);
        return view('upanel.point.edit',['data'=>$data]);
    }

    /**
     * Обновление
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
        PointService::updatePoint($request);
        return redirect()->route('upaenl.point');
    }

    /**
     * Удаление
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        PointService::destroyPoint($id);
        return redirect()->route('upaenl.point');
    }
}
