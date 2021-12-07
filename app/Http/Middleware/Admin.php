<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role == 'admin' || Auth::user()->role == 'user' || Auth::user()->role == 'lawyer'){
            return $next($request);
        }else{
            dd(Auth::user()->role);
            return redirect()->route('frontend.home');
        }
    }
}
