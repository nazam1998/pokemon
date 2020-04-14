<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Type;
use App\User;
use App\Genre;
use App\Helpers\General\CollectionHelper;
use App\Pokeball;
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
        $this->authorize('admin',User::class);

        $pokemons=Pokemon::paginate(5);
        return view('admin.pokemon.index',compact('pokemons'));
    }

    public function sort(Request $request){
        $pokemons=Pokemon::orderBy($request->order);
        return view('admin.pokemon.index',compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin',User::class);

        $types=Type::all();
        $genres=Genre::all();
        return view('admin.pokemon.add',compact('types','genres'));
        
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
            'nom'=>'required|string',
            'image'=>'required|image',
            'niveau'=>'required|min:0|max:100',
            'id_type'=>'required|integer',
            'id_genre'=>'required|integer',
        ]);
        $this->authorize('admin',User::class);

        $poke=new Pokemon();
        $image=Storage::put('public',$request->image);
        $imageName=basename($image);
        $poke->nom=$request->nom;
        $poke->niveau=$request->niveau;
        $poke->id_type=$request->id_type;
        $poke->id_genre=$request->id_genre;
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
        $this->authorize('admin',User::class);

        $pokemon = Pokemon::find($id);
        $pokeballs=Pokeball::all();
        return view('showPokemon',compact('pokemon','pokeballs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin',User::class);

        $poke=Pokemon::find($id);
        $types=Type::all();
        $genres=Genre::all();
        return view('admin.pokemon.edit',compact('poke','types','genres'));
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
            'nom'=>'required|string',
            'image'=>'required|image',
            'niveau'=>'required|min:0|max:100',
            'id_type'=>'required|integer',
            'id_genre'=>'required|integer',
        ]);
        $this->authorize('admin',User::class);

        $poke=Pokemon::find($id);
        if(Storage::exists(public_path($poke->image))){
            unlink($poke->image);
        }
        $image=Storage::put('public',$request->image);
        $imageName=basename($image);
        $poke->nom=$request->nom;
        $poke->niveau=$request->niveau;
        $poke->id_type=$request->id_type;
        $poke->id_genre=$request->id_genre;
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
        $this->authorize('admin',User::class);

        $poke=Pokemon::find($id);
        if(Storage::exists(public_path($poke->image))){
            unlink($poke->image);
        }
        if($poke->id_user!=null){
            $poke->user->id_role=2;
            $poke->user->save();
        }
        $poke->delete();
        return redirect()->route('welcome');
    }
    public function search(Request $request){
        $search=Pokemon::where('nom','LIKE','%'.$request->nom.'%')->get();
        $total=count($search);
        $pokemons = CollectionHelper::paginate($search, $total, 5);

        if(count($search)==0){
            $msg="Sorry! We couldn't any pokemon with this name";
            $msgColor='danger';
        }else{
            $msg='We found '.$total.' pokemons with this name';
            $msgColor='success';
        }
        return view('admin.pokemon.show',compact('pokemons','msg','msgColor'));
    }
}

