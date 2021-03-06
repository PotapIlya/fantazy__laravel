<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('role_id');
            $table->string('name', 50);

            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('role_id')->references('id')->on('player_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
