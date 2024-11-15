<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
        $response = $next($request);
        
        if (Auth::guard($guard)->check()) {

            if ($guard == 'admin' && Auth::guard($guard)->user()->status != 1) {
                Auth::guard($guard)->logout();

                // Session::flash('msg', 'Your account has been disabled by Administrator. Please contact Administrator');

                // response();
                return Redirect::back()->withErrors(['email' => 'Your account has been disabled. Please contact Administrator']);
            }
        }
        
        return $response;
    }
}
