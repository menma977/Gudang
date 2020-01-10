<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $responseRule = explode('|', $role);
        if (!in_array($request->user()->role, $responseRule)) {
            return abort(404);
        }

        return $next($request);
    }
}
