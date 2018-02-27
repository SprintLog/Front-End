<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcfs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->string('des');
            $table->integer('weight');
            $table->integer('rate');
            $table->integer('result');
            $table->integer('projectId');
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
        Schema::dropIfExists('tcfs');
    }
}
