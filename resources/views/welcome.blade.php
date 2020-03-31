@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container text-center mx-auto">
    <div class="row text-center">  
        @foreach ($pokemons as $item)
        <div class="card col-3 my-1" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$item->nom}}</h5>
                <p class="card-text">Type : <span style="color: {{$types->where('id',$item->id_type)->first()->color}}"> {{$types->where('id',$item->id_type)->first()->type}}</span></p>
                <a href="{{route('showPokemon',$item->id)}}" class="my-2"><img src="{{asset('storage/pokedex.png')}}" alt=""></a>
                @auth

                    @if (Auth::user()->id_role==2)
            <a href="{{route('adopt',$item->id)}}"><img src="{{asset('storage/pokeball.jpg')}}" alt=""></a>
                    @elseif($item->id_user==Auth::id())
                    <a href="{{route('release',$item->id)}}"><img src="{{asset('storage/openball.png')}}" alt=""></a>
                    @endif
                @endauth
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{route('addPokemon')}}" class="btn btn-primary my-5">Ajouter un nouveau Pokemon</a>
</div>
@endsection