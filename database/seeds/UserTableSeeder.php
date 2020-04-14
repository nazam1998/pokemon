<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Nazam',
            'email'=>'nazam90-be@mail.com',
            'password'=>Hash::make('Nazam1998'),
            'abandon'=>0,
            'id_role'=>3,
            'credits'=>1000
        ]);
    }
}