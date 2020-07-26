<?php


namespace App\services;


use App\Models\Company;
use Illuminate\Http\Request;

class CompanyService
{
    /**
     * Создать компанию
     * @param Request $request
     * @param $user_id
     * @return bool
     */
    static function createCompany(Request $request,$user_id){
        $model=new Company();
        $model->short_name=$request->input('short_name');
        $model->full_name=$request->input('full_name');
        $model->user_id=$user_id;
        return $model->save();
    }

    /**
     * Обновить данные фирмы
     * @param Request $request
     * @param $user_id
     * @return mixed
     */
    static function updateCompany(Request $request,$user_id){
        $model=Company::where('user_id',$user_id)->first();
        $model->short_name=$request->input('short_name');
        $model->full_name=$request->input('full_name');
        return $model->save();
    }
}
