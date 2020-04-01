<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;
use App\Type;

class WelcomeController extends Controller
{
    public function index(){
        $pokemons=Pokemon::paginate(5);
        return view('welcome',compact('pokemons','types'));
    }
}
