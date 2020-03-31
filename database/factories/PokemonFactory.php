<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pokemon;
use App\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
$factory->define(Pokemon::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\FakerPokemon($faker));
    $filename=Str::random(10).time().'.png';
    Storage::disk('public')->copy('pikachu.png',$filename);
    return [
        'nom'=>$faker->pokemonName,
        'niveau'=>rand ( 1,100),
        'image'=>$filename,
        'id_type'=>Type::inRandomOrder()->first()->id
    ];
});
