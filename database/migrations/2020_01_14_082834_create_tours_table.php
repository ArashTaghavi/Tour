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
            $table->date('start_date');
            $table->date('end_date');
            $table->string('price');
            $table->float('discount')->default(0);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('operator')->default(0);
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
