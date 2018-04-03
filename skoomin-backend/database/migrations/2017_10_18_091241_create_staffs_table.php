<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('cnic', 255);
            $table->string('gender', 20);
            $table->string('picture_url', 250);
            $table->date('dob', 255);
            $table->string('qualification', 250);
            $table->string('bio_data', 250);
            $table->string('job_title', 250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
