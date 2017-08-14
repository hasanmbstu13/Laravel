<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintaings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paintaings', function (Blueprint $thePaintaing) {
            $thePaintaing->increments('id');
            $thePaintaing->string('title');
            $thePaintaing->string('artist');
            $thePaintaing->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paintaings');
    }
}
