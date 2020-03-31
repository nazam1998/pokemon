<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class hasPokeball
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
        if(Auth::check() && Auth::user()->pokeball>0){

            return $next($request);
        }
        return redirect()->back()->withErrors(['msg'=>'You don\'t have enough pokeball']);
    }
}
