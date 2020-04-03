<?php

namespace App\Http\Middleware;

use App\Pokemon;
use App\Pokeball;
use Closure;

class hasOwner
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
        $pokeball=Pokeball::find($idPokeball);
        $logo=$pokeball->logo;
        $id=$request->route()->parameters()['idPokemon'];
        $pokemon=Pokemon::find($id);
        
        if($pokemon->id_user==null){
            return $next($request);
        }
        return redirect()->back()->with(['captured'=>'animated wobble delay-1s','logo'=>$logo,'info'=>'Ce pokemon appartient à un autre utilisateur','color'=>'text-danger']);
    }
}
