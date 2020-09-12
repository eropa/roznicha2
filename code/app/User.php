<?php

namespace App;

use App\Models\Company;
use App\Models\Userpoint;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCompany(){
        $company=Company::where('user_id',Auth::id())->first();
        if(is_null($company)){
            $data=Userpoint::where('user_id',Auth::id())->first();
            $company=Company::where('id',$data->company_id)->first();
        }

        return $company;
    }

}
