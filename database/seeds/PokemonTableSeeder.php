<?php

use Illuminate\Database\Seeder;
use App\Pokemon;
class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pokemon::truncate();
        factory(Pokemon::class,70)->create();
    }
}
