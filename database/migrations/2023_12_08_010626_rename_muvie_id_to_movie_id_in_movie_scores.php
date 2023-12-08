<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMuvieIdToMovieIdInMovieScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie_scores', function (Blueprint $table) {
            $table->renameColumn('muvie_id', 'movie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movie_scores', function (Blueprint $table) {
            $table->renameColumn('movie_id', 'muvie_id');
        });
    }
}
