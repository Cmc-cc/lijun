<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\App;
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
        if(Session::has('lang'))
        {
            $lang = Session::get('lang');            
            App::setLocale($lang);        
        }
        
        if (Auth::guard($guard)->check()) {
            $url = $guard ? '/member/index':'/admin';
            return redirect($url);
        }

        return $next($request);
    }
}
