<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_id')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('lesson_image')->nullable();
            $table->text('short_text')->nullable();
            $table->text('full_text')->nullable();
            $table->integer('position');
            $table->string('downloadable_files')->nullable();
            $table->boolean('free_lesson')->nullable();
            $table->boolean('is_published')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
