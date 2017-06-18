<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->text('title')->nullable();
            $table->text('fake_link')->nullable();
            $table->text('real_link');
            $table->string('link_basic')->index();
            $table->text('full_link');
            $table->integer('user_id');
            $table->string('user_name');
            $table->timestamps();

            // $table->text('description')->nullable();
            // $table->string('image_link')->nullable();
            // $table->string('query_key');
            // $table->string('query_value');
            // $table->string('sub');
            // $table->string('domain');
            // $table->integer('clicks')->default(0);
            // $table->string('tiny_url_link')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
