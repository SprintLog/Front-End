<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('thai_name');
            $table->string('eng_name');
            $table->integer('typeProjectId');
            $table->integer('advisorsId');
            $table->integer('developerId');
            $table->integer('abstack');
            $table->integer('keywords');
            $table->integer('userId');
            $table->timestamps();

            $table->foreign('typeProjectId')->references('id')->on('projects');
            $table->foreign('advisorsId')->references('id')->on('projects');
            $table->integer('developerId');->references('id')->on('projects');
            $table->foreign('userId')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
