<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokeballsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokeballs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('logo');
            $table->float('prix');
            $table->timestamps();
        });

        Schema::create('pokeball_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_pokeball');
            $table->foreign('id_pokeball')->on('pokeballs')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pokeballs');
    }
}
