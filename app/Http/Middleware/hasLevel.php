<?php

namespace App\Http\Middleware;

use App\Bag;
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
        
        $bag=Bag::all();
        
        $idPokeball=$request->route()->parameters()['idPokeball'];
        $idPokemon=$request->route()->parameters()['idPokemon'];
        
        // $user=User::find(Auth::id());
        
        $pokeball=Pokeball::find($idPokeball);
        $logo=$pokeball->logo;
        $pokemon=Pokemon::find($idPokemon);
        if($pokeball->max >= $pokemon->niveau){
            return $next($request);
        }

        $bag->where('id_user',Auth::id())->where('id_pokeball',$idPokeball)->first()->delete();
        // $user->pokeballs()->newPivotStatementForId($idPokeball)->delete();
        return redirect()->back()->with(['captured'=>'animated rotateOutDownLeft delay-1s','logo'=>$logo,'info'=>'La pokeball n\'a aucun effet sur ce Pokemon','color'=>'text-danger']);

    }
}
