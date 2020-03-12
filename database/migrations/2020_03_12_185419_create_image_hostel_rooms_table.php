<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageHostelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_hostel_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_image');
            $table->unsignedBigInteger('hostel_room_id');
            $table->foreign('hostel_room_id')->references('id')->on('hostel_rooms')->onDelete('cascade');
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
        Schema::dropIfExists('image_hostel_rooms');
    }
}
