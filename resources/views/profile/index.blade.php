@extends('layouts/app')

@section('title','Mon Prokemon')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Nom: {{$user->name}}</h5>
                    <p class="card-text">Pokeball: {{$user->pokeball}}</p>
                    <p class="card-text">Credits: {{$user->credits}}</p>
                    <p class="card-text">Rôle: {{App\Role::find($user->id_role)->role}}</p>
                    @if ($user->abandon>0)
                    @if ($user->abandon<3)
                    <p class="text-warning">Vous avez abandonnez {{$user->abandon}} Pokemon</p>
                    @else
                    <p class="text-danger">Votre coeur de pierre vous a fait abandonner {{$user->abandon}} pokemons.</p>
                    @endif
                    @endif
                    
                    
            </div>
            @if($user->id_role==1)
            <div class="col-5">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/'.$pokemon->image)}}" class="card-img-top">
                    <hr>
                    <div class="card-body">
                    <h5 class="card-title">{{$pokemon->nom}}</h5>
                    <p class="card-text">Type: <span style="color: {{$type->color}}">{{$type->type}}</span></p>
                    <p class="card-text">Niveau: {{$pokemon->niveau}}</p>
                    <p class="card-text"><a href="{{route('release',$pokemon->id)}}" class="btn btn-danger">Relâcher</a></p>
                    
            </div>
            @else 
                <h5 class="text-danger text-center">You don't have any pokemon</h5>
            @endif
            
        </div>
    </div>
@endsection