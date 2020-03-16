<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::insert('INSERT INTO `features` (`id`, `title`, `created_at`, `updated_at`) VALUES (NULL, \'Bar\', \'2020-03-15 00:00:00\', \'2019-12-22 13:05:15\'), (NULL, \'Wifi\', \'2020-01-15 00:00:00\', \'2020-01-20 00:00:00\')');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
