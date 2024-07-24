<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Session;
class WapMemberAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if(Session::has('lang'))
        {
            $lang = Session::get('lang');            
            App::setLocale($lang);        
        }
//        if (Auth::guard($guard)->guest()) {
//            if ($request->ajax() || $request->wantsJson()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect()->guest('phone/login');
//            }
//        }
        $member = auth('member')->user();
        if (!$member)
            return redirect()->guest('m/login');

        return $next($request);
    }
}
