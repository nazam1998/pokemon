@extends('layouts.admin')

@section('title','Add Type')

@section('content')
<div class="container mx-auto">
    <form action="{{route('savePokemon')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            @error('nom')
            <small>{{$message}}</small>
            @enderror
            <input type="text" class="form-control" id="nom" placeholder="Rock" value="{{old('nom')}}" name="nom">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            @error('image')
            <small>{{$message}}</small>
            @enderror
            <input type="file" class="form-control" id="image" value="{{old('image')}}" name="image">
        </div>

        <div class="form-group">
            <label for="niveau">Niveau</label>
            @error('niveau')
            <small>{{$message}}</small>
            @enderror
            <input type="text" class="form-control" id="niveau" value="{{old('niveau')}}" name="niveau">
        </div>
        
        <div class="form-group">
            <label for="type">Type</label>
            @error('id_type')
            <small>{{$message}}</small>
            @enderror
            <select name="id_type" id="type" class="custom-select">
                @foreach ($types as $item)
                @if (old('id_type')==$item->id)
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
                @if (old('id_genre')==$item->id)
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