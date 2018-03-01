<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();
        });



        Schema::table('macths', function(Blueprint $table){
            $table->foreign('userId')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('projectId')
                ->references('id')->on('projects')
                ->onDelete('cascade');

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


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_project');
    }
}
