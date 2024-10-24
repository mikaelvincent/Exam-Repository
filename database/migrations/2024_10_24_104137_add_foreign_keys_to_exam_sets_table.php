<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exam_sets', function (Blueprint $table) {
            $table->foreign(['parent_id'], 'exam_sets_ibfk_1')->references(['id'])->on('exam_sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_sets', function (Blueprint $table) {
            $table->dropForeign('exam_sets_ibfk_1');
        });
    }
};
