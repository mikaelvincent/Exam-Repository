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
        Schema::table('user_progresses', function (Blueprint $table) {
            $table->foreign(['answer_id'], 'user_progresses_ibfk_1')->references(['id'])->on('answers');
            $table->foreign(['user_id'], 'user_progresses_ibfk_2')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_progresses', function (Blueprint $table) {
            $table->dropForeign('user_progresses_ibfk_1');
            $table->dropForeign('user_progresses_ibfk_2');
        });
    }
};
