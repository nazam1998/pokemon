@extends('layouts.admin')

@section('title','Add Type')

@section('content')
<div class="container mx-auto">
    <form action="{{route('saveType')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            @error('type')
            <small>{{$message}}</small>
            @enderror
            <input type="type" class="form-control" id="type" placeholder="Rock" value="{{old('type')}}" name="type">
        </div>

        <div class="form-group">
            <label for="color">color</label>
            @error('color')
            <small>{{$message}}</small>
            @enderror
            <input type="color" class="form-control" id="color" value="{{old('color')}}" name="color">
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
