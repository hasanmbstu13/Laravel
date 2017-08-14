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
        Schema::create('paintaings', function ($thePaintaing) {
            $thePaintaing->increments('id');
            $thePaintaing->string('title');
            $thePaintaing->string('artist');
            $thePaintaing->integer('year');
            $thePaintaing->timestamps();
            //
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
