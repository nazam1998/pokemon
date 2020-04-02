<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;

class WelcomeController extends Controller
{
    public function index(){
        $pokemons=Pokemon::paginate(12);
        return view('welcome',compact('pokemons','pokeballs'));
    }
}
