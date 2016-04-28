<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class AuthValidation
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
        if (Auth::guest())
            return redirect('auth/login');

        return $next($request);
    }
}
