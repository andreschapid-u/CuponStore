<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class EmpresarioMiddleware
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
        $role = Auth::user()->person->role;
        if ($role->iEmpresario() || $role->isAdmin()) {
            return $next($request);
        }
        return abort(404);
    }
}
