<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateChangePasswordPost;
use App\User;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function ViewChangePassword() {
    
    return view('security.change_password');

  }// public function ViewChangePassword()

  public function ChangePassword(UpdateChangePasswordPost $request) {
    
    try{

        $User=User::find(auth()->id());

        $User->fill(['password'=>Hash::make($request->password)])->save();

        return response()->json(["success" => true, "msg" => "Cambio exitoso!"],200);

    }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

    }//catch(\Exception $e)

  }// public function ChangePassword()

}
