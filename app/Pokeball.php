<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokeball extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','id_user','id_pokeball');
    }
}
