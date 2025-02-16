<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\App;
use Session;
class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'wechat',
        'pay/notify',
        'pay/return',
        'pay/bank',
        'pay/notice'
    ];

    public function handle($request, Closure $next)
    {
        if(Session::has('lang'))
        {
            $lang = Session::get('lang');            
            App::setLocale($lang);        
        }
        
        if (
            $this->isReading($request) ||
            $this->runningUnitTests() ||
            $this->tokensMatch($request)
        ) {
            return $this->addCookieToResponse($request, $next($request));
        }
        if ($request->ajax())
            return responseWrong('停留页面过长请刷新');

        throw new TokenMismatchException;
    }
}
