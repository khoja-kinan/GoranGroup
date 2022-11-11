<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title', 255);
            $table->string('slider_title_ar', 255);
            $table->string('slider_subtitle', 255);
            $table->string('slider_subtitle_ar', 255);
            $table->string('btn_name', 255);
            $table->string('btn_name_ar', 255);
            $table->string('btn_link')->nullable();
            $table->string('slider_image');
            $table->bigInteger( 'post_id' )->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('home_sliders');
    }
}
