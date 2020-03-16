<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::insert('INSERT INTO `policies` (`id`, `title`, `created_at`, `updated_at`) VALUES (NULL, \'سیگار ممنوع\', \'2020-03-15 00:00:00\', \'2020-01-04 00:00:00\'), (NULL, \'حیوان خانگی ممنوع\', \'2020-01-15 00:00:00\', \'2020-01-20 00:00:00\')');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policies');
    }
}
