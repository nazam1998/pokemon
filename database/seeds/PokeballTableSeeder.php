<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokeballTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Pokeball::truncate();
        DB::table('pokeballs')->insert([
            [
            'nom'=>'classic',
            'logo'=>'pokeball.jpg',
            'prix'=>100
        ],
            [
            'nom'=>'super',
            'logo'=>'superball.png',
            'prix'=>300
        ],
            [
            'nom'=>'ultimate',
            'logo'=>'ultimate.jpg',
            'prix'=>500
        ],
        ]);
    }
}
