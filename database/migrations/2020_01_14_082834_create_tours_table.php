<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('slug');
            $table->string('from');
            $table->string('to');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->integer('min_group');
            $table->integer('max_group');
            $table->text('accommodation');
            $table->text('transportation');
            $table->text('travel_style');
            $table->text('trips');
            $table->string('price');
            $table->text('description')->nullable();
            $table->string('profile_image');
            $table->unsignedBigInteger('tour_leader_id');
            $table->foreign('tour_leader_id')->references('id')->on('tour_leaders')->onDelete('cascade');
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
        Schema::dropIfExists('tours');
    }
}
