<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Games extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('version', 50)->comment('Version of the game');
            $table->integer('game_play')->comment('Number of times game is played');
            $table->date('date_added', $precision = 0);
            $table->timestamps();
        });

        // Schema::create('gameplays', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('game')->comment('Name of game played');
        //     $table->integer('game_play')->comment('Number of times game is played');
        //     // $table->date('date_added', $precision = 0);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
        // Schema::dropIfExists('gameplays');
    }
}
