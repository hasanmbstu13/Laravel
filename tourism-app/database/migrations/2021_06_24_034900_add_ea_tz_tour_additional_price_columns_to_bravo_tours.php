<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEaTzTourAdditionalPriceColumnsToBravoTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            //EA Price
            $table->decimal('ea_price', 12,2)->nullable();
            $table->decimal('ea_sale_price', 12,2)->nullable();

            //EA Tour type
            $table->integer('ea_duration')->nullable();
            $table->integer('ea_min_people')->nullable();
            $table->integer('ea_max_people')->nullable();

            // EA Service
            $table->tinyInteger('ea_enable_service_fee')->nullable();
            $table->text('ea_service_fee')->nullable();

            //TZ Price
            $table->decimal('tz_price', 12,2)->nullable();
            $table->decimal('tz_sale_price', 12,2)->nullable();

            //TZ Tour type
            $table->integer('tz_duration')->nullable();
            $table->integer('tz_min_people')->nullable();
            $table->integer('tz_max_people')->nullable();

            // TZ Service
            $table->tinyInteger('tz_enable_service_fee')->nullable();
            $table->text('tz_service_fee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            $table->dropColumn('ea_price');
            $table->dropColumn('ea_sale_price');
            $table->dropColumn('ea_duration');
            $table->dropColumn('ea_min_people');
            $table->dropColumn('ea_max_people');
            $table->dropColumn('tz_price');
            $table->dropColumn('tz_sale_price');
            $table->dropColumn('tz_duration');
            $table->dropColumn('tz_min_people');
            $table->dropColumn('tz_max_people');
        });
    }
}
