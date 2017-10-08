<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAgentAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'agent')
    {
        if (!Auth::guard($guard)->check()) {
          flash('U need to login first')->success();
            return redirect(route('agent.login.form'));
        }
        return $next($request);
    }
}
