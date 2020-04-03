@extends('layouts.app')

@section('title'){{$pokemon->nom}}@endsection
@section('content')
<div class="container mx-auto">
    <div class="card pokecard" style="width: 18rem;">
        <img src="{{asset('storage/'.$pokemon->image)}}" class="card-img-top">
        <hr>
        <div class="card-body text-center">
            <h5 class="card-title">{{$pokemon->nom}}</h5>
            <p class="card-text">Genre: {{$pokemon->genre->genre}}</p>
            <p class="card-text">Type: <span style="color: {{$pokemon->type->color}}">{{$pokemon->type->type}}</span></p>
            <p class="card-text">Niveau: {{$pokemon->niveau}}</p>
            <div class="row text-center">
                @auth
                @if(Auth::user()->id_role==2)
                <p class="card-text w-100">

                    @foreach ($pokeballs as $pokeball)
                    {{count(Auth::user()->pokeballs->where('id',$pokeball->id))}}
                    <a href="{{route('adopt',['idPokeball'=>$pokeball->id,'idPokemon'=>$pokemon->id])}}"><img src="{{asset('storage/'.$pokeball->logo)}}" alt=""></a>
                    @endforeach
                </p>
                @endif
                @if($pokemon->id_user==Auth::id())
                <p class="card-text w-100"><a href="{{route('release',$pokemon->id)}}" class="mx-auto my-2"><img src="{{asset('storage/openball.png')}}" alt=""></a></p>
                @endif
                @endauth
                <a href="{{route('showGenre',$pokemon->genre->id)}}" class="col-5 mx-3 my-2 btn btn-primary">Show all Pokemon of this genre</a>
                <a href="{{route('showType',$pokemon->type->id)}}" class="col-5 my-2 btn btn-primary">Show all Pokemon of this type</a>

                <a href="{{route('editPokemon',$pokemon->id)}}" class="col-5 mx-3 btn btn-warning">Edit</a>
                <a href="{{route('deletePokemon',$pokemon->id)}}" class="col-5 btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection
