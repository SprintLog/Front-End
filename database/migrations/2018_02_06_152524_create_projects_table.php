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
<<<<<<< HEAD
            $table->increments('id')->unsigned();;
            $table->string('thai_name');
            $table->string('eng_name');
            $table->integer('typeProjectId');
            $table->integer('advisorsId')->unsigned();;
            $table->integer('developerId')->unsigned();;
            $table->integer('abstack');
            $table->integer('keywords');
            $table->integer('userId')->unsigned();;
=======
          $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('thai_name')->nullable();
            $table->string('eng_name')->nullable();
            $table->integer('typeProjectId')->unsigned();
            $table->integer('advisorsId');
            $table->integer('developerId');
            $table->integer('abstack');
            $table->integer('keywords');
            $table->integer('userId')->unsigned();
>>>>>>> Mark
            $table->timestamps();


            $table->foreign('advisorsId')->references('id')->on('users');
            $table->foreign('developerId')->references('id')->on('users');
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
        //$table->dropForeign('projects_typeProjectId_foreign');
    }
}
