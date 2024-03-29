<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::guard($guard)->user()->rol_id == 1){
                    return redirect(RouteServiceProvider::ADMIN);
                }else if(Auth::guard($guard)->user()->rol_id == 2){
                    return redirect(RouteServiceProvider::SUB);
                }else if(Auth::guard($guard)->user()->rol_id == 3){
                    return redirect(RouteServiceProvider::JEFE);
                }else if(Auth::guard($guard)->user()->rol_id == 4){
                    return redirect(RouteServiceProvider::PROF);
                }
                
            }
        }

        return $next($request);
    }
}
