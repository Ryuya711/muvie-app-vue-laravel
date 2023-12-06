<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('muvie_scores', function (Blueprint $table) {
            $table->unique('muvie_id'); // ユニーク制約の追加
        });
    }

    public function down()
    {
        Schema::table('muvie_scores', function (Blueprint $table) {
            $table->dropUnique('muvie_scores_muvie_id_unique'); // ユニーク制約の削除
        });
    }
};
