@extends('layouts.app')

@section('title','Add Genre')

@section('content')
<div class="container mx-auto">
    <form action="{{route('saveGenre')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="genre">genre</label>
            @error('genre')
            <small>{{$message}}</small>
            @enderror
            <input genre="genre" class="form-control" id="genre" placeholder="Female Forte" value="{{old('genre')}}" name="genre">
        </div>

        
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
