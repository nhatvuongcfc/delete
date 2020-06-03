<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id_result');
            $table->string('result');
            $table->string('result_essay');

            $table->integer('id_user')->unsigned();
            $table->integer('id_exam')->unsigned();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('id_exam')->references('id_exam')->on('exams')->onDelete('cascade');

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
        Schema::dropIfExists('results');
    }
}
