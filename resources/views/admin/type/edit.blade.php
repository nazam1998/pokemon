@extends('layouts.admin')

@section('title','Edit Type')

@section('content')
    <div class="container mx-auto">
    <form action="{{route('updateType',$type->id)}}" method="post">
    @csrf
    <div class="form-group">
        <label for="type">Type</label>
        @error('type')
    <small>{{$message}}</small>
        @enderror
    <input type="type" class="form-control" id="type" placeholder="Rock" value="{{old('type',$type->type)}}" name="type">
      </div>
      <div class="form-group">
        <label for="color">color</label>
        @error('color')
        <small>{{$message}}</small>
        @enderror
        <input type="color" class="form-control" id="color"value="{{old('color',$type->color)}}" name="color">
    </div>
      <button type="submit" class="btn btn-success">Modifier</button>
    </form>
    </div>
@endsection