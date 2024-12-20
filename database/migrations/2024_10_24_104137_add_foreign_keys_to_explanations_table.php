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
        Schema::table('explanations', function (Blueprint $table) {
            $table->foreign(['question_id'], 'explanations_ibfk_1')->references(['id'])->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('explanations', function (Blueprint $table) {
            $table->dropForeign('explanations_ibfk_1');
        });
    }
};
