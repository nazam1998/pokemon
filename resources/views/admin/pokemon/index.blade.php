@extends('layouts.app')

@section('title','Pokemons')

@section('content')
    <div class="container text-center">
        <table>
            <thead>
                <tr><th colspan="11">List of All Pokemons</th></tr>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Type</td>
                    <td>Niveau</td>
                    <td>Genre</td>
                    <td>Image</td>
                    <td colspan="5">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokemons as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nom}}</td>
                    <td style="color: {{$item->type->color}}">{{$item->type->type}}</td>
                    <td>{{$item->niveau}}</td>
                    <td>{{$item->genre->genre}}</td>
                    <td><img src="{{asset('storage/'.$item->image)}}" alt=""></td>
                    <td >
                        <a href="{{route('showType',$item->genre->id)}}" class="btn btn-danger">Show all Pokemon of this genre</a>
                    </td>
                    <td >
                        <a href="{{route('showType',$item->type->id)}}" class="btn btn-danger">Show all Pokemon of this type</a>
                    </td>
                    <td><a href="{{route('showPokemon',$item->id)}}"><img src="{{asset('storage/pokedex.png')}}" alt=""></a></td>
                    <td><a href="{{route('editPokemon',$item->id)}}" class="btn btn-warning">Edit Pokemon</a></td>
                    <td><a href="{{route('deletePokemon',$item->id)}}" class="btn btn-danger">Delete Pokemon</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginate-links">
            {{$pokemons->links()}}
        </div>
    <a href="{{route('addPokemon')}}" class="btn btn-primary my-5">Ajouter un nouveau Pokemon</a>
    </div>
@endsection