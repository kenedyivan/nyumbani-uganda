<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class RedirectToCreateListing
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
        if (!Auth::guard('agent')->check()) {
            Session::put('redirect_to_create_listing', URL::full());
            flash('Please login first')->success();
            return redirect(route('agent.login.form'));
        }

        return $next($request);
    }
}
