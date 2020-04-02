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
            'nom'=>'Classic',
            'logo'=>'classic.png',
            'prix'=>100,
            'max'=>20
        ],
            [
            'nom'=>'Super',
            'logo'=>'superball2.png',
            'prix'=>300,
            'max'=>50
        ],
            [
            'nom'=>'Master',
            'logo'=>'masterball.png',
            'prix'=>500,
            'max'=>100
        ],
        ]);
    }
}
