@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container text-center mx-auto">
    <div class="row text-center">
        @foreach ($pokemons as $item)
        <div class="card pokecard col-3 my-1" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$item->nom}}</h5>
                <p class="card-text">Type : <span style="color: {{$item->type->color}}"> {{$item->type->type}}</span>
                </p>
                <a href="{{route('showPokemon',$item->id)}}" class="my-2"><img src="{{asset('storage/pokedex.png')}}"
                        alt=""></a>
                @auth
                <p class="card-text">
                    @can('isDresseur')

                    @foreach ($pokeballs as $pokeball)
                    @can('hasPoke',$pokeball)
                    <a href="{{route('adopt',['idPokeball'=>$pokeball->id,'idPokemon'=>$item->id])}}">
                        <img src="{{asset('storage/'.$pokeball->logo)}}" alt="">
                    </a>
                    {{count(Auth::user()->pokeballs->where('id',$pokeball->id))}}
                    @endcan
                    @endforeach
                    @elseif($item->id_user==Auth::id())
                    <a href="{{route('release',$item->id)}}"><img src="{{asset('storage/openball.png')}}" alt=""></a>
                    @endcan
                </p>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
    <div class="paginate-links">
        {{$pokemons->links()}}
    </div>
    <a href="{{route('addPokemon')}}" class="btn btn-primary my-5">Ajouter un nouveau Pokemon</a>
</div>
@endsection
