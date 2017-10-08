<?php

namespace App\Http\Middleware;

use Closure;

class UserRedirection
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
        if (!Auth::guard($guard)->check()) {
            if((Auth::agent()->user_type)==0){
            return redirect(route('index'));
            }else{
            return redirect(route('agent.login.form'));
            }
        }
        return $next($request);
    }
}
