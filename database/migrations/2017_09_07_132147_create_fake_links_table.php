<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFakeLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fake_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fake_link')->nullable();
            $table->text('title');
            $table->text('description');
            $table->text('img');
            $table->text('body');
            $table->string('slug')->unique();
            $table->text('link');
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
        Schema::dropIfExists('fake_links');
    }
}
