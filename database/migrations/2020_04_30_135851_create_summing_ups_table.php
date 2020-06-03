<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummingUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summing_ups', function (Blueprint $table) {
            $table->increments('id_sum');

            $table->integer('id_user')->unsigned();
            $table->integer('id_transcript')->unsigned();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('id_transcript')->references('id_transcript')->on('transcripts')->onDelete('cascade');

            $table->integer('point_sum');

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
        Schema::dropIfExists('summing_ups');
    }
}
