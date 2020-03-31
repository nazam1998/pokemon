@extends('layouts.app')

@section('title','Pokemons')

@section('content')
    <div class="container text-center">
        <table>
            <thead>
                <tr><th colspan="8">List of All Pokemons</th></tr>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Type</td>
                    <td>Niveau</td>
                    <td>Image</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokemons as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nom}}</td>
                    <td style="color: {{$types->where('id',$item->id_type)->first()->color}}">{{$types->where('id',$item->id_type)->first()->type}}</td>
                    <td>{{$item->niveau}}</td>
                    <td><img src="{{asset('storage/'.$item->image)}}" alt=""></td>
                    <td><a href="{{route('showPokemon',$item->id)}}"><img src="{{asset('storage/pokedex.png')}}" alt=""></a></td>
                    <td><a href="{{route('editPokemon',$item->id)}}" class="btn btn-warning">Edit Pokemon</a></td>
                    <td><a href="{{route('deletePokemon',$item->id)}}" class="btn btn-danger">Delete Pokemon</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{route('addPokemon')}}" class="btn btn-primary my-5">Ajouter un nouveau Pokemon</a>
    </div>
@endsection