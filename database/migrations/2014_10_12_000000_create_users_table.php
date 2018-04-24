<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('mobile')->nullable(); //for client
            $table->string('country')->nullable(); // for client
            $table->string('gender')->nullable(); /// for client (male,female) 
            $table->string('national_id')->nullable();  //for manager and recep
            $table->string('avatar_image')->nullable(); //for manager and recep
            $table->int('creator')->nullable(); // holds the id of the creator

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
