<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
   public function CreateProfil(Request $request){
        CompanyService::createCompany($request,Auth::id());
        return redirect()->back();
   }


   public function UpdateProfil(Request $request){
        CompanyService::updateCompany($request,Auth::id());
       return redirect()->back();
   }

}
