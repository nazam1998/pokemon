@extends('layouts.app')

@section('title','Pokemons')

@section('content')
    <div class="container text-center">
        <table style="border-color: {{$type->color}}">
        <thead style="background-color: {{$type->color}}">
                <tr><th colspan="8">List of All {{$type->type}} Pokemons</th></tr>
                <tr>
                    <td style="border-color: {{$type->color}}">ID</td>
                    <td style="border-color: {{$type->color}}">Nom</td>
                    <td style="border-color: {{$type->color}}">Niveau</td>
                    <td style="border-color: {{$type->color}}">Image</td>
                    <td style="border-color: {{$type->color}}" colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pokemons as $item)
                    <tr>
                    <td style="border-color: {{$type->color}}">{{$item->id}}</td>
                    <td style="border-color: {{$type->color}}">{{$item->nom}}</td>
                    <td style="border-color: {{$type->color}}">{{$item->niveau}}</td>
                    <td style="border-color: {{$type->color}}"><img src="{{asset('storage/'.$item->image)}}" alt=""></td>
                    <td style="border-color: {{$type->color}}"><a href="{{route('showPokemon',$item->id)}}" class="btn btn-success">Show Pokemon</a></td>
                    <td style="border-color: {{$type->color}}"><a href="{{route('editPokemon',$item->id)}}" class="btn btn-warning">Edit Pokemon</a></td>
                    <td style="border-color: {{$type->color}}"><a href="{{route('deletePokemon',$item->id)}}" class="btn btn-danger">Delete Pokemon</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{route('addPokemon')}}" class="btn btn-primary my-5">Ajouter un nouveau Pokemon</a>
    </div>
@endsection