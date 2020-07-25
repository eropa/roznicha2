<?php


namespace App\services;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Создать запись
     * @param Request $request
     * @return User
     */
    static function create(Request $request){
        $modelUser=new User();
        $modelUser->name=$request->input('name');
        $modelUser->email=$request->input('email');
        $modelUser->role=$request->input('role');
        $modelUser->password=Hash::make($request->input('password'));
        $modelUser->save();
        return $modelUser;
    }

    /**
     * Удалить
     * @param $id
     * @return int
     */
    static function destroy($id){
        return User::destroy($id);
    }

    /**
     * Обновить данные пользователя
     * @param Request $request
     * @return mixed
     */
    static function update(Request $request){
        $modelUser=User::find($request->input('user_id'));
        // В зависемости от типа
        if($request->input('type')==1){
            $modelUser->name=$request->input('name');
            $modelUser->email=$request->input('email');
            $modelUser->role=$request->input('role');
        }else{
            $modelUser->password=Hash::make($request->input('password'));
        }
        return $modelUser->save();
    }
}
