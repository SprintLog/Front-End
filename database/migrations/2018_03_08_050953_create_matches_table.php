<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('userId')->unsigned();
          $table->integer('projectId')->unsigned();
          $table->timestamps();
        });

        Schema::table('projects', function(Blueprint $table){
            $table->foreign('typeProjectId')
                ->references('id')->on('type_project')
                ->onDelete('cascade');
        });

        Schema::table('tasks', function(Blueprint $table){
            $table->foreign('projectId')
                ->references('id')->on('projects')
                ->onDelete('cascade');

        });
        Schema::table('uploads', function(Blueprint $table){
            $table->foreign('projectId')
                ->references('id')->on('projects')
                ->onDelete('cascade');
                
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
        Schema::table('posts', function(Blueprint $table){
          $table->foreign('userId')
              ->references('id')->on('users')
              ->onDelete('cascade');

          $table->foreign('projectId')
              ->references('id')->on('projects')
              ->onDelete('cascade');
        });
        Schema::table('comment', function(Blueprint $table){
          $table->foreign('taskId')
                  ->references('id')->on('tasks')
                  ->onDelete('cascade');

          $table->foreign('userId')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });


        Schema::table('subTasks', function(Blueprint $table){
          $table->foreign('taskId')
                  ->references('id')->on('tasks')
                  ->onDelete('cascade');
        });
        Schema::table('images', function(Blueprint $table){
          $table->foreign('taskId')
                  ->references('id')->on('tasks')
                  ->onDelete('cascade');
        });

        Schema::table('progresses', function(Blueprint $table){
         $table->foreign('taskId')
                 ->references('id')->on('tasks')
                 ->onDelete('cascade');
        });

        Schema::table('matches', function(Blueprint $table){
          $table->foreign('userId')
              ->references('id')->on('users')
              ->onDelete('cascade');

          $table->foreign('projectId')
                  ->references('id')->on('projects')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
