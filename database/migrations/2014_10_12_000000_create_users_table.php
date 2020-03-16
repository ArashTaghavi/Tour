<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('role')->default(1);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::insert('INSERT INTO `users` (`id`, `first_name`, `last_name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, \'arash@gmail.com\', NULL, \'$2y$10$ziSjg8MacQrkIiXbG0KlaOXWRgmS/KRDZSRIrt9.3bfgcgNdxKfPm\', NULL, \'2020-03-03 10:05:33\', \'2020-03-03 10:05:35\'),
(2, NULL, NULL, 0, \'admin@gmail.com\', NULL, \'$2y$10$ziSjg8MacQrkIiXbG0KlaOXWRgmS/KRDZSRIrt9.3bfgcgNdxKfPm\', NULL, \'2020-03-03 10:05:33\', \'2020-03-03 10:05:33\'),
(3, NULL, NULL, 2, \'hostel@gmail.com\', NULL, \'$2y$10$ziSjg8MacQrkIiXbG0KlaOXWRgmS/KRDZSRIrt9.3bfgcgNdxKfPm\', NULL, \'2020-03-03 10:05:33\', \'2020-03-03 10:05:33\'),
(4, NULL, NULL, 3, \'hotel@gmail.com\', NULL, \'$2y$10$ziSjg8MacQrkIiXbG0KlaOXWRgmS/KRDZSRIrt9.3bfgcgNdxKfPm\', NULL, \'2020-03-03 10:05:33\', \'2020-03-03 10:05:33\')');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
