<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_image');
            $table->unsignedBigInteger('hotel_room_id');
            $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms')->onDelete('cascade');
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
        Schema::dropIfExists('image_rooms');
    }
}
