<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('niveau');
            $table->string('image');
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->on('types')->references('id')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->on('users')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}
