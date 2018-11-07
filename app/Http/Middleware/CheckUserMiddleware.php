<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Redirect;
use Auth;

class CheckUserMiddleware
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
        if(Auth::user()->username != Request::segment(2) && Auth::user()->id != Request::segment(2) )
        {
            return Redirect::route('profile', Auth::user()->username);
        }
        return $next($request);
    }
}
