<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id_exam');
            $table->string('name_exam');
            
            $table->integer('time');
            $table->dateTime('start_time');
            $table->integer('status')->default(0);
            
            $table->integer('id_point_column')->unsigned();
            $table->foreign('id_point_column')->references('id_point_column')->on('point_columns')->onDelete('cascade');

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
        Schema::dropIfExists('exams');
    }
}
