<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name_arabic',255);
            $table->string('company_name_english',255);
            $table->string('company_name_kurdish',255)->nullable();
            $table->bigInteger( 'section_id' )->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->longText('bio_arabic');
            $table->longText('bio_english');
            $table->longText('bio_kurdish')->nullable();
            $table->string('phone',255)->nullable();
            $table->string('whatsapp_num',255)->nullable();
            $table->string('address_arabic',255);
            $table->string('address_english',255);
            $table->string('address_kurdish',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('web_site',255)->nullable();
            $table->string('location',255);
            $table->string('facebook_link',255)->nullable();
            $table->string('instagram_link',255)->nullable();
            $table->string('linkedin_link',255)->nullable();
            $table->string('youtube_link',255)->nullable();
            $table->string('background_image');
            $table->string('logo');
            $table->string('video_link')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
