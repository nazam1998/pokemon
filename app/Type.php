<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function pokemons()
    {
        return $this->hasMany('App\Pokemon', 'id_type');
    }
}
