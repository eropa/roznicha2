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
}
