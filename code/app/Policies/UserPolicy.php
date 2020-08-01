<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Администратор или нет
     * @param User $user
     * @return bool
     */
    public function is_admin(User $user){
        if (Auth::check()) {
            if($user->role=="admin"){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function get_shop(User $user){
        if (Auth::check()) {
            return (is_null($user->getCompany())?false:true);
        }else{
            return false;
        }
    }


}
