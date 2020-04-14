<?php

namespace App\Http\Controllers;
use App\Pokemon;
use App\Genre;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin',User::class);

        $genres=Genre::all();
        return view('admin.genre.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin',User::class);

        return view('admin.genre.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin',User::class);

        $request->validate([
            'genre'=>'required|string|unique:genres',
        ]);
        $genre=new Genre();
        $genre->genre=$request->genre;
        $genre->save();
        return redirect()->route('genre');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('admin',User::class);

        $genre=Genre::find($id);
        $pokemons=Pokemon::where('id_genre',$id)->paginate(10);
        return view('showGenre',compact('genre','pokemons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin',User::class);

        $genre=Genre::find($id);
        return view('admin.genre.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'genre'=>'required|string|unique:genres,genre,'.$id,
        ]);
        $this->authorize('admin',User::class);

        $genre=Genre::find($id);
        $genre->genre=$request->genre;
        $genre->save();
        return redirect()->route('genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin',User::class);

        $genre=Genre::find($id);
   
        foreach ($genre->pokemons as $item) {
            if($item->id_user!=null){
                $item->user->id_role=2;
                $item->user->save();
            }
            $item->delete();
        }
        $genre->delete();
        return redirect()->back();
    }
}