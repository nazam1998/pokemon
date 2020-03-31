@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container text-center mx-auto">
    <div class="row">  
        @foreach ($pokemons as $item)
        <div class="card col-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$item->nom}}</h5>
                <p class="card-text">Type : {{$types->where('id',$item->id_type)->first()->type}}</p>
                <a href="{{route('showPokemon',$item->id)}}" class="btn btn-primary my-2">Show</a>
                @auth

                    @if (Auth::user()->id_role==2)
            <a href="{{route('adopt',$item->id)}}" class="btn btn-success">Catch</a>
                    @elseif($item->id_user==Auth::id())
                    <a href="{{route('release',$item->id)}}" class="btn btn-danger">Release</a>
                    @endif
                @endauth
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{route('addPokemon')}}" class="btn btn-primary my-5">Ajouter un nouveau Pokemon</a>
</div>
@endsection