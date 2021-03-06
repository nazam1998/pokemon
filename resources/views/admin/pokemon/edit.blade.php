@extends('layouts.admin')

@section('title','Add Pokemon')

@section('content')
<div class="container mx-auto">
    <img src="{{asset('storage/'.$poke->image)}}" class="img-fluid w-25 bg-secondary rounded-circle" alt="">
    <form action="{{route('updatePokemon',$poke->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            @error('nom')
            <small>{{$message}}</small>
            @enderror
            <input type="text" class="form-control" id="nom" placeholder="Rock" value="{{old('nom',$poke->nom)}}"
                name="nom">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            @error('image')
            <small>{{$message}}</small>
            @enderror
            <input type="file" class="form-control" id="image" value="{{old('image',$poke->image)}}" name="image">
        </div>

        <div class="form-group">
            <label for="niveau">Niveau</label>
            @error('niveau')
            <small>{{$message}}</small>
            @enderror
            <input type="text" class="form-control" id="niveau" value="{{old('niveau',$poke->niveau)}}" name="niveau">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            @error('id_type')
            <small>{{$message}}</small>
            @enderror
            <select name="id_type" id="type" class="custom-select">
                @foreach ($types as $item)
                @if ($item->id==old('id_type',$poke->id_type))
                <option selected value="{{$item->id}}">{{$item->type}}</option>
                @else
                <option value="{{$item->id}}">{{$item->type}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            @error('id_genre')
            <small>{{$message}}</small>
            @enderror
            <select name="id_genre" id="genre" class="custom-select">
                @foreach ($genres as $item)
                @if ($item->id==old('id_genre',$poke->id_genre))
                <option selected value="{{$item->id}}">{{$item->genre}}</option>
                @else
                <option value="{{$item->id}}">{{$item->genre}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
