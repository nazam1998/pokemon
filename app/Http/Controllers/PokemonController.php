<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Type;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pokemons=Pokemon::all();
        $types=Type::all();
        return view('admin.pokemon.index',compact('pokemons','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types=Type::all();
        return view('admin.pokemon.add',compact('types'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required|string|unique:pokemons',
            'image'=>'required|image',
            'niveau'=>'required|min:0|max:100',
            'id_type'=>'required|integer'
        ]);
        $poke=new Pokemon();
        $image=Storage::put('public',$request->image);
        $imageName=basename($image);
        $poke->nom=$request->nom;
        $poke->niveau=$request->niveau;
        $poke->id_type=$request->id_type;
        $poke->image=$imageName;
        $poke->save();
        return redirect()->route('pokemon');
    }

    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pokemon = Pokemon::find($id);
        $type=Type::where('id',$pokemon->id_type)->first();
        return view('showPokemon',compact('pokemon','type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poke=Pokemon::find($id);
        $types=Type::all();
        return view('admin.pokemon.edit',compact('poke','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom'=>'required|string|unique:pokemons,nom,'.$id,
            'image'=>'required|image',
            'niveau'=>'required|min:0|max:100',
            'id_type'=>'required|integer'
        ]);
        $poke=Pokemon::find($id);
        if(Storage::exists(public_path($poke->image))){
            unlink($poke->image);
        }
        $image=Storage::put('public',$request->image);
        $imageName=basename($image);
        $poke->nom=$request->nom;
        $poke->niveau=$request->niveau;
        $poke->id_type=$request->id_type;
        $poke->image=$imageName;
        $poke->save();
        return redirect()->route('pokemon');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poke=Pokemon::find($id);
        if(Storage::exists(public_path($poke->image))){
            unlink($poke->image);
        }
        $poke->delete();
        return redirect()->route('welcome');
    }
}
