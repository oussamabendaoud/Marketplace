<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_item_languages', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('lang_code');
            $table->string('script_title')->nullable();
            $table->string('script_description')->nullable();
            $table->string('image_title')->nullable();
            $table->string('image_description')->nullable();
            $table->string('video_title')->nullable();
            $table->string('video_description')->nullable();
            $table->string('audio_title')->nullable();
            $table->string('audio_description')->nullable();
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
        Schema::dropIfExists('product_item_languages');
    }
};
