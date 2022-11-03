<?php

namespace App\Http\Middleware;

use Closure;

class PermissionManager
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
        // if(auth()){
        //     if(auth()->user()->id != 1 && auth()->user()->type == 1){
        //         return redirect('/administrator');
        //     }
        // }
		
		/*$url = strtok($_SERVER['REQUEST_URI'], '?');
        $fullUrlExp = explode('administrator', $url);
		$urlExp = array_shift($fullUrlExp);*/
		
		
        $url = strtok($_SERVER['REQUEST_URI'], '?');
        $urlExp = explode('/', $url);
        $segment = array_slice($urlExp,3);

        if(count($segment) != 0){
            $firstSegment = $segment[0];
            if($firstSegment != 'home'){
                if($firstSegment == 'subadmin' && auth()->user()->id != 1){
                    return redirect('/administrator');
                }

                $menu = \App\MenuTree::where('link', $firstSegment)->select('id', 'link')->first();
                if($menu != null){
                    $permit = \App\MenuPermit::where([['menu_id','=',$menu->id],['user_id','=',auth()->user()->id]])->first();
                    if($permit == null){
                        return redirect('/administrator');
                    }
                }

                $submenu = \App\SubmenuTree::where('link', $firstSegment)->select('id','link')->first();
                if($submenu != null){
                    $permit = \App\MenuPermit::where([['sub_menu_id','=',$submenu->id],['user_id','=',auth()->user()->id]])->first();
                    if($permit == null){
                        return redirect('/administrator');
                    }
                }

            }
        }
        

        return $next($request);
    }
}
