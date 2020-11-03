<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, String $role)
    {

        if (!Auth::check()) 
            return redirect('/login');

            $UserRole=UserRole::query()->where('user_id',auth()->id())->select(['id','user_id','role_id'])->orderBy('id','DESC');

            $UserRole= $UserRole->with([

                'role' => function($query){

                    $query->select('id','role_name','role_description');

                },  

            ])->get(['id','user_id','role_id']);

            if(count($UserRole)==0)
                $UserRole="";
            else
                $UserRole=$UserRole[0]->role->role_name;

        if($UserRole == $role)
            return $next($request);

        return redirect('/login');
    }
}
