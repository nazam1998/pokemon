@extends('layouts.app')

@section('title','Edit Genre')

@section('content')
    <div class="container mx-auto">
    <form action="{{route('updateGenre',$genre->id)}}" method="post">
    @csrf
    <div class="form-group">
        <label for="genre">Genre</label>
        @error('genre')
    <small>{{$message}}</small>
        @enderror
    <input type="genre" class="form-control" id="genre" value="{{old('genre',$genre->genre)}}" name="genre">
      </div>
      <button type="submit" class="btn btn-success">Modifier</button>
    </form>
    </div>
@endsection