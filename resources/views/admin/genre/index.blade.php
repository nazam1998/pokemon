@extends('layouts.admin')

@section('title','Genre')

@section('content')
    <div class="container text-center">
        <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Genres</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                  <thead>
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
            </div>
          </div>
    <a href="{{route('addGenre')}}" class="btn btn-primary my-5">Ajouter un nouveau Genre</a>
    </div>
@endsection



