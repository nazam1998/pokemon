@extends('layouts.app')

@section('title','Genre')

@section('content')
    <div class="container text-center">
        <table>
            <thead>
                <tr><th colspan="7">List of All Genre</th></tr>
                <tr>
                    <td>ID</td>
                    <td>Genre</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td style="background-color: {{$item->color}}">{{$item->genre}}</td>
                    <td><a href="{{route('showGenre',$item->id)}}" class="btn btn-success">Show all of this Genre</a></td>
                    <td><a href="{{route('editGenre',$item->id)}}" class="btn btn-warning">Edit Genre</a></td>
                    <td><a href="{{route('deleteGenre',$item->id)}}" class="btn btn-danger">Delete Genre</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{route('addGenre')}}" class="btn btn-primary my-5">Ajouter un nouveau Genre</a>
    </div>
@endsection