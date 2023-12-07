<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('movie_scores', function (Blueprint $table) {
            $table->unique('movie_id'); // ユニーク制約の追加
        });
    }

    public function down()
    {
        Schema::table('movie_scores', function (Blueprint $table) {
            $table->dropUnique('movie_scores_movie_id_unique'); // ユニーク制約の削除
        });
    }
};
