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
            $table->string('mobile')->nullable();
            $table->string('country')->nullable();
            $table->string('gender')->nullable(); /// male or female 
            $table->string('nationalid')->nullable(); 
            $table->string('avatarimage')->nullable();
            $table->integer('type')->nullable();  //admin,manager,receptionist,client
            $table->integer('is_approved')->nullable();;// 0 or 1 
            $table->integer('approved_by')->nullable();;
            // receptionist id 
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
