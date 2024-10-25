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
        Schema::create('exam_sets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable()->index('parent_id');
            $table->string('name');
            $table->string('slug');
            $table->boolean('is_exam')->default(false);
            $table->enum('children_sort_by', ['id', 'name', 'slug', 'created_at', 'updated_at'])->default('id');
            $table->enum('children_sort_order', ['ASC', 'DESC'])->default('ASC');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();

            $table->unique(['slug', 'parent_id'], 'unique_slug_per_parent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_sets');
    }
};
