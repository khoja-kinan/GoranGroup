<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('company_name',255);
            $table->string('path');
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
        Schema::dropIfExists('imgs');
    }
}
