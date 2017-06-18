<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('website')->nullable();
            $table->string('image_url');
            $table->string('video_link');
            $table->string('link_basic');
            $table->string('real_link');
            $table->string('full_link');
            $table->text('link_fb');
            $table->string('embed');
            $table->integer('user_id');
            $table->string('user_name');
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
        Schema::dropIfExists('video_links');
    }
}
