<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
    public function handle($request, Closure $next, $guard = null)
    {
  
        if (Auth::guard($guard)->check()) {
       
            session()->put('oldUrl',$request->url());                   
            return redirect()->route('user.signin');  
           
        }

        if ($guard == "admin" && Auth::guard($guard)->check()) {   
                  
            return response()->view('admin.home');
       
        }  
     

       

        return $next($request);
    }
}
