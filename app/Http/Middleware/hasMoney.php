<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Pokeball;
class hasMoney
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
        $id=$request->route()->parameters()['id'];
        $pokeball=Pokeball::find($id);
        if(Auth::check()&&Auth::user()->credits>=$pokeball->prix){
            return $next($request);
        }
        return redirect()->back()->withErrors(['msg'=>'You don\'t have enough credits']);
    }
}
