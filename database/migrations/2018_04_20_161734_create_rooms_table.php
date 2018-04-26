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
            $table->string('number');
            $table->integer('capacity');
            $table->integer('user_id'); ///foriegn key to the manager table
            $table->integer('floor_id'); // foreign key to the floor table
            $table->string('isavailable'); //true or false
            $table->float('price'); // add from diaa branch
            $table->string('image'); //from diaa branch
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
