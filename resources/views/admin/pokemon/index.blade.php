@extends('layouts.admin')

@section('title','Pokemons')

@section('content')
<div class="container text-center">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pokemons</h3>

            <div class="card-tools">
                <form action="{{route('searchPokemon')}}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="nom" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 100vh;">
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <td>
                            <form action="{{route('sort')}}" method="POST">
                                @csrf
                                <label for=""></label>
                                <input type="hidden" name="order" value="id">
                                <button type="submit" class="btn btn-primary">ID</button>
                            </form>
                        </td>
                        <td><form action="{{route('sort')}}" method="POST">
                            @csrf
                            <label for=""></label>
                            <input type="hidden" name="order" value="nom">
                            <button type="submit" class="btn btn-primary">Nom</button>
                        </form></td>
                        <td>Type</td>
                        <td>Niveau</td>
                        <td>Genre</td>
                        <td>Image</td>
                        <td colspan="5">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pokemons as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nom}}</td>
                        <td style="color: {{$item->type->color}}">{{$item->type->type}}</td>
                        <td>{{$item->niveau}}</td>
                        <td>{{$item->genre->genre}}</td>
                        <td><img src="{{asset('storage/'.$item->image)}}" alt=""></td>
                        <td>
                            <a href="{{route('showType',$item->genre->id)}}" class="btn btn-danger">Show all Pokemon of
                                this genre</a>
                        </td>
                        <td>
                            <a href="{{route('showType',$item->type->id)}}" class="btn btn-danger">Show all Pokemon of
                                this type</a>
                        </td>
                        <td><a href="{{route('showPokemon',$item->id)}}"><img src="{{asset('storage/pokedex.png')}}"
                                    alt=""></a></td>
                        <td><a href="{{route('editPokemon',$item->id)}}" class="btn btn-warning">Edit Pokemon</a></td>
                        <td><a href="{{route('deletePokemon',$item->id)}}" class="btn btn-danger">Delete Pokemon</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="paginate-links">
        {{$pokemons->links()}}
    </div>

    <a href="{{route('addPokemon')}}" class="btn btn-primary my-5">Ajouter un nouveau Pokemon</a>
</div>
@endsection
