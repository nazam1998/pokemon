<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); 
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PokeballTableSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(PokemonTableSeeder::class);
    }
}
