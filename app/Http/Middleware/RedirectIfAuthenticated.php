<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    /*public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }*/

    public function handle($request, Closure $next, $guard = null) {
  
        if (Auth::guard($guard)->check()) {

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

                case 'representative_leading':

                    return redirect('/representative/home');

                break;

                case 'representative_viewfinder':

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

        }//if (Auth::guard($guard)->check())

        return $next($request);
    }
}
