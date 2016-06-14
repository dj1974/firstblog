<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('image');
            $table->string('image_title');
            $table->string('video');
            $table->string('video_title');
            $table->text('body');
            $table->string('mime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('postdetails');
    }
}
