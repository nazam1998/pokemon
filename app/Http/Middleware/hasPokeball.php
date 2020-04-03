<?php

namespace App\Http\Middleware;

use App\Pokeball;
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
        $id=$request->route()->parameters()['idPokeball'];
        if(Auth::check() && Auth::user()->pokeballs->where('id',$id)->count()>0){
            return $next($request);
        }
        return redirect()->back()->withErrors(['msg'=>'You don\'t have enough pokeball of this type']);
    }
}