<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedHostelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bed_hostel_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('price');
            $table->float('discount')->default(0);
            $table->date('start_date')->comment('for discount')->nullable();
            $table->date('end_date')->comment('for discount')->nullable();
            $table->unsignedBigInteger('hostel_room_id');
            $table->foreign('hostel_room_id')->references('id')->on('hostel_rooms')->onDelete('cascade');
            $table->tinyInteger('is_reserved')->default(0);
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
        Schema::dropIfExists('bed_hostel_rooms');
    }
}
