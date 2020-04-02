<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Pokemon;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\PokemonMail;

class MyPokemonController extends Controller
{

    public function __construct()
    {
        $this->middleware('dresseur')->only('adopt');
        $this->middleware('pokeball')->only('adopt');
        $this->middleware('master')->only('release');
    }

    public function adopt($id)
    {
        $user = User::find(Auth::id());
        $pokemon = Pokemon::find($id);
        $body = 'You captured';
        Mail::to($user->email,$user->name)->send(new PokemonMail($user,$pokemon,$body));
        $pokemon->id_user = Auth::id();
        $user->pokeball -= 1;
        $user->id_role = 1;
        $user->save();
        $pokemon->save();
        return redirect()->back();
    }

    public function release($id)
    {
        $pokemon = Pokemon::find($id);
        $pokemon->id_user = null;
        $user = User::find(Auth::id());
        $body = 'You released';
        Mail::to($user->email,$user->name)->send(new PokemonMail($user,$pokemon,$body));
        $user->id_role = 2;
        $user->abandon += 1;
        $user->save();
        $pokemon->save();
        return redirect()->back();
    }

}
