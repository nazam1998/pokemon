@extends('layouts/app')

@section('title','Mon Prokemon')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="card pokecard rounded-0" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Nom: {{$user->name}}</h5>
                    <span class="card-text">Pokeball:</span>
                    @if ($user->pokeball==0)
                        0
                    @else    
                    <p class="row container my-2">
                        <?php $i=0 ?>
                        @while ($i<$user->pokeballs->count() && $i<20)
                        <img src="{{asset('storage/'.$user->pokeballs[$i]->logo)}}" alt="" class="img-fluid nbPoke">
                            <?php $i++?>
                        @endwhile
                        @if ($user->pokeballs->count()>20)
                    <i class="fas fa-plus-circle my-1 mx-1">{{$user->pokeballs->count()-20}}<img src="{{asset('storage/'.$user->pokeballs[$i]->logo)}}" alt="" class="img-fluid nbPoke"></i>
                        @endif
                        {{-- @for($i=0;;$i++)
                        @endfor --}}
                    </p>
                    @endif
                    <p class="card-text">Credits: {{$user->credits}}$</p>
                    <p class="card-text">Rôle: {{$user->role->role}}</p>
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
                <div class="card pokecard border-0" style="width: 18rem;">
                    <img src="{{asset('storage/'.$user->pokemon->image)}}" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title">{{$user->pokemon->nom}}</h5>
                    <p class="card-text">Niveau: {{$user->pokemon->genre->genre}}</p>
                    <p class="card-text">Type: <span style="color: {{$user->pokemon->type->color}}">{{$user->pokemon->type->type}}</span></p>
                    <p class="card-text">Niveau: {{$user->pokemon->niveau}}</p>
                    <p class="card-text"><a href="{{route('release',$user->pokemon->id)}}"><img src="{{asset('storage/openball.png')}}" alt=""></a></p>
                    
            </div>
            @else 
                <h5 class="text-danger text-center">Vous n'avez actuellement aucun pokemon en votre possession</h5>
            @endif
            
        </div>
    </div>
@endsection