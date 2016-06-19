<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->binary('user_image');
            $table->string('type')->default('guest');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->string('avatar')->default('default.jpg');
            $table->string('profession')->default('none');
            $table->boolean('approved')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
