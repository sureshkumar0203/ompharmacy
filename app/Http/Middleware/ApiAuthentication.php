<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class ApiAuthentication
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
		/*if(Session::get('user_id') == ""){
			 return redirect('user-login');
		}else{
            return $next($request);
		}*/
		
        /*$HOST_NAME = Config::get('constants.server_name');
        $SERVER_URL = $_SERVER['HTTP_HOST'];
        if($HOST_NAME != $SERVER_URL){
            $res_ = array('error'=>'true','message'=>"Invalid access !");
            return redirect('./');
        }else{
            return $next($request);
        }*/
    }
}
