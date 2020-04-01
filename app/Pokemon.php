<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';

    public function type()
    {
        return $this->belongsTo('App\Type', 'id_type');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function genre()
    {
        return $this->belongsTo('App\Genre', 'id_genre');
    }
}
