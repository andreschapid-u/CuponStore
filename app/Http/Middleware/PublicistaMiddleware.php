<?php

namespace App\Http\Middleware;

use Closure;

class PublicistaMiddleware
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
        // dd(Auth::user()->person->role);
        if(Auth::user()->isPublicista()){
            return $next($request);
        }
        return abort(404);
    }
}
