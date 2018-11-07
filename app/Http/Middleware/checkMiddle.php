<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Request;

class checkMiddle
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
        if( Request::segment(1) == 'login' )
        {
           Ridirect::route('register');
        }
        
        return $next($request);
    }
}
