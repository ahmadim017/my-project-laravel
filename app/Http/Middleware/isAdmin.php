<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if (Auth()->check() && $request->user()->roles == "ADMIN" & $request->user()->status =="ACTIVE" ){
            return $next($request);
        }
        return redirect()->guest('/');
    }
}
