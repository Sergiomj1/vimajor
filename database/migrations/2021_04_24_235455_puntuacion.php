<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Puntuacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntuaciones', function(Blueprint $table)
        {
            $table->id();
            $table->integer("puntuacion",);
            $table->string("comentario",225);
            $table->timestamp('created_at');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->foreign('video_id')->references('id')->on('video')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('puntuaciones', function (Blueprint $table) {
            //
        });
    }
}
