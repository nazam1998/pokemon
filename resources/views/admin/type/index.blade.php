@extends('layout.main')

@section('title','Type')

@section('content')
    <div class="container text-center">
        <table>
            <thead>
                <tr><th colspan="7">List of All Type</th></tr>
                <tr>
                    <td>ID</td>
                    <td>Type</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $item)
                    <tr>
                    <td>{{$item->id}}</td>
                    <td style="background-color: {{$item->color}}">{{$item->type}}</td>
                    <td><a href="{{route('showType',$item->id)}}" class="btn btn-success">Show all of this Type</a></td>
                    <td><a href="{{route('editType',$item->id)}}" class="btn btn-warning">Edit Type</a></td>
                    <td><a href="{{route('deleteType',$item->id)}}" class="btn btn-danger">Delete Type</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <a href="{{route('addType')}}" class="btn btn-primary my-5">Ajouter un nouveau Type</a>
    </div>
@endsection