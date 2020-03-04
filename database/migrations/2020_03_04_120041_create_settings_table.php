<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->text('about_us');
            $table->timestamps();
        });

        $default_value = [
            'phone' => 'شماره تلفن را وارد نمایید.',
            'email' => 'ایمیل را وارد نمایید.',
            'address' => 'آدرس را وارد نمایید.',
            'about_us'=> 'متن درباره ما را وارد نمایید.'
        ];
        \Illuminate\Support\Facades\DB::table('settings')->insert($default_value);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
