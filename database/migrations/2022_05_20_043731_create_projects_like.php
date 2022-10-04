<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsLike extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_like', function (Blueprint $table) {
            $table->id();

            /* Связь с пользователем */
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id')->references('id')->on('projects');
            $table->string('ip');
            $table->string('useragent');
            $table->string('hash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_like');
    }
}
