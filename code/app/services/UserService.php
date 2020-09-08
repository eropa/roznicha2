<?php


namespace App\services;


use App\Models\Userpoint;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if($request->input('firma')>0 && $request->input('point')){
            Userpoint::where('user_id',$request->input('user_id'))->delete();
            $modelSvizka=new Userpoint();
            $modelSvizka->user_id=$request->input('user_id');
            $modelSvizka->point_id=$request->input('point');
            $modelSvizka->company_id=$request->input('firma');
            $modelSvizka->save();
        }

        return $modelUser->save();
    }

    /**
     * Обовляем данные в профиле
     * @param Request $request
     * @return mixed
     */
    static function UpdateProfil(Request $request){
        $modelUser=User::find(Auth::id());
        // В зависемости от типа
        if($request->input('type')==1){
            $modelUser->name=$request->input('name');
        }else{
            $modelUser->password=Hash::make($request->input('password'));
        }
        return $modelUser->save();
    }

}
