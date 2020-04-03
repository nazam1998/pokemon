<?php

namespace App\Http\Controllers;

use App\Pokeball;
use Illuminate\Http\Request;
use App\Pokemon;

class WelcomeController extends Controller
{
    public function index(){
        $pokemons=Pokemon::paginate(12);
        $pokeballs=Pokeball::all();
        return view('welcome',compact('pokemons','pokeballs'));
    }
}
