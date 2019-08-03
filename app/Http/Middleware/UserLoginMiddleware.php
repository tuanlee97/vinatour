<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
Use Alert;
class UserLoginMiddleware
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
         if(Auth::check())
        {   
            return $next($request);
        }
        else
        {
            if(!(Auth::check())){
              
               return redirect()->back()->with('thongbao','Chưa đăng nhập');
            }
        }        
    }
}
