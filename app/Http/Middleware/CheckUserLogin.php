<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::get('userId') != ''){
            $checkUser = \App\UserRegistration::where('id', Session::get('userId'))->first();
            if($checkUser->status == 0){
                return redirect('/user-logout');
            }
        }

        if(Session::get('userId') == ""){
            return redirect('/');
        }
        
        return $next($request);
    }
}
