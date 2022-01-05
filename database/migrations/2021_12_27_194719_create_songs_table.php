<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("summary");
            $table->text("description");
            $table->string("category");
            $table->string("genre");
            $table->string("track");
            $table->string("composer");
            $table->string("producer");
            $table->integer("uploader");
            $table->string("image");
            $table->string("tags");
            $table->integer("verified");
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
        Schema::dropIfExists('songs');
    }
}
