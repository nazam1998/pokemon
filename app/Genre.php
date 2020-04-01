<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function pokemons(){
        return $this->hasMany('App\Pokemon','id_genre');   
    }
}
