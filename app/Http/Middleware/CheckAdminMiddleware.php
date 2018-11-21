<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Redirect;
use Auth;

class CheckAdminMiddleware
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
        if( Auth::user()->user_role() != 'Admin'  )
        {
            return Redirect::route('profile', Auth::user()->username);
        }
        return $next($request);
    }
}
