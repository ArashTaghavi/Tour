<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('floor');
            $table->integer('number');
            $table->text('options');
            $table->unsignedBigInteger('hostel_id');
            $table->foreign('hostel_id')->references('id')->on('hostels')->onDelete('cascade');
            $table->integer('bed_count');
            $table->text('description');
            $table->tinyInteger('is_full_reserved')->default(0);
            $table->string('profile_image');
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
        Schema::dropIfExists('hostel_rooms');
    }
}
