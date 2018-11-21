<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Redirect;
use Auth;

class ManagementMiddleware
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
        if( Auth::user()->user_role() != "Admin" &&  
            Auth::user()->user_role() != "Moderator" )
        {
           return Redirect::route('profile', Auth::user()->username);   
        }
        return $next($request);
    }
}
