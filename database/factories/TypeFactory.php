<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;

$factory->define(Type::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\FakerPokemon($faker));
    return [
        'type'=>$faker->pokemonType,
        'color'=>$faker->hexColor
    ];
});
