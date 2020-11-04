<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Role;
use App\Models\UserRole;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {

        $role=UserRole::query()->where('user_id',auth()->id())->select(['id','user_id','role_id'])->orderBy('id','DESC');

        $role= $role->with([

            'role' => function($query){

                $query->select('id','role_name','role_description');

            },  

        ])->get(['id','user_id','role_id']);

        if(count($role)==0)
          $role="";
        else
           $role=$role[0]->role->role_name;

        switch ($role) {

            case 'administrator':

                return redirect('/admin/home');

            break;

            case 'business_administrator':

                return redirect('/business/home');

            break;
            
            case 'teacher':

                return redirect('/teacher/home');

            break; 

            case 'attorney':

                return redirect('/representative/home');

            break;
            
            case 'student':

                return redirect('/student/home');

            break; 

            case 'administrative':

                return redirect('/administrative/home');

            break; 

            /*default:

                return redirect('/');

            break;*/

        }// switch ($role)
    
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
