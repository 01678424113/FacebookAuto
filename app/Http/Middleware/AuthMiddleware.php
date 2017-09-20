<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class AuthMiddleware
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
        if(Cookie::has('accessToken'))
        {
            return $next($request);
        }else{
            return view('facebook.login');
        }
    }
}
