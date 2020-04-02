<?php

namespace App\Http\Middleware;

use App\Pokeball;
use App\Pokemon;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class hasLevel
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
        $idPokeball=$request->route()->parameters()['idPokeball'];
        $idPokemon=$request->route()->parameters()['idPokemon'];
        $user=User::find(Auth::id());
        $pokeball=Pokeball::find($idPokeball);
        $pokemon=Pokemon::find($idPokemon);
        if($pokeball->max>=$pokemon->level){
            return $next($request);
        }
        $user->pokeballs()->newPivotStatementForId($idPokeball)->delete();
        $user->save();

        return redirect()->back()->with(['msg'=>'You wasted a pokeball']);

    }
}
