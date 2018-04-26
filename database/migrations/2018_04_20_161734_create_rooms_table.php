<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->float('price');
            $table->integer('capacity');
            $table->string('user_id'); ///foriegn key to the manager table 
            $table->integer('floor_id'); // foreign key to the floor table 
            $table->string('image'); ///foriegn key to the manager table 
            $table->string('isavailable'); //true or false 
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
        Schema::dropIfExists('rooms');
    }
}
