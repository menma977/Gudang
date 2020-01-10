<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckUser
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
        if (Auth::user()->delete == 0) {
            Auth::logout();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
