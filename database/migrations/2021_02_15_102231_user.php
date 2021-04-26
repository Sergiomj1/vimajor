<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function(Blueprint $table){

            $table->id();
            $table->string('username',255);
            $table->string('email',255);
            $table->string('passwd',255);
            $table->timestamps();
            $table->string('imagen',255);
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->string('remember_token',255);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {

        });
    }
}
