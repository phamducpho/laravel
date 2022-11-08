<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckAge
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
            
            if(!Auth::check()){
                    return redirect('admin/login1');

            }
            else{
               $a=Auth::user();
               $b=$a->level;
               if($b==1){ 
              return $next($request);}
              else{
                Auth::logout();
                 return redirect('admin/login1');
              }
            }
    }
}
