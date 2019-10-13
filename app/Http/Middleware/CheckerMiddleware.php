<?php

namespace App\Http\Middleware;

use Closure;

class CheckerMiddleware
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
        if(Auth::user()->isChecker()){
            return $next($request);
        }
        return abort(404);
    }
}
