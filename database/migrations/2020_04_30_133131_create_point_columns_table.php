<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_columns', function (Blueprint $table) {

            $table->increments('id_point_column');
            $table->string('name_point_column');

            $table->integer('id_transcript')->unsigned();
            $table->foreign('id_transcript')->references('id_transcript')->on('transcripts')->onDelete('cascade');

            $table->integer('he_so');

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
        Schema::dropIfExists('point_columns');
    }
}
