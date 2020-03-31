@extends('layouts.app')

@section('title'){{$pokemon->nom}}@endsection
@section('content')
<div class="container mx-auto">
    <div class="card" style="width: 18rem;">
        <img src="{{asset('storage/'.$pokemon->image)}}" class="card-img-top">
        <hr>
        <div class="card-body">
            <h5 class="card-title">{{$pokemon->nom}}</h5>
            <p class="card-text">Type: <span style="color: {{$type->color}}">{{$type->type}}</span></p>
            <p class="card-text">Niveau: {{$pokemon->niveau}}</p>
            <div class="row">
                @auth
                @if(Auth::user()->id_role==2)
                <a href="{{route('adopt',$pokemon->id)}}" class="mx-auto my-2 btn btn-success">Adopter</a>
                @endif
                @if($pokemon->id_user==Auth::id())
                <p class="card-text"><a href="{{route('release',$pokemon->id)}}" class="btn btn-danger">Relâcher</a></p>
                @endif
                @endauth
                <a href="{{route('editPokemon',$pokemon->id)}}" class="btn btn-warning mx-2">Edit</a>
                <a href="{{route('deletePokemon',$pokemon->id)}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endsection
