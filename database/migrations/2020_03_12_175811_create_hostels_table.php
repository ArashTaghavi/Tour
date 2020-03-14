<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->string("slug");
            $table->integer('bedroom_count');
            $table->integer('bed_count');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('postal_code',10);
            $table->integer('star');
            $table->string('phone');
            $table->text('address');
            $table->text('address2')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('profile_image');
            $table->text('options');
            $table->text('policies');
            $table->string('contact_name');
            $table->string('manager_email')->nullable();
            $table->string('booking_email');
            $table->string('website')->nullable();
            $table->string('currency');
            $table->string('language')->nullable();
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
        Schema::dropIfExists('hostels');
    }
}
