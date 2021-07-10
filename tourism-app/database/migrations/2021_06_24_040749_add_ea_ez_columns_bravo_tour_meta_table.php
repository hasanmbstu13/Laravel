<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEaEzColumnsBravoTourMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_tour_meta', function (Blueprint $table) {
            // EA tour meta
            $table->tinyInteger('ea_enable_person_types')->nullable();
            $table->text('ea_person_types')->nullable();

            $table->tinyInteger('ea_enable_extra_price')->nullable();
            $table->text('ea_extra_price')->nullable();

            $table->text('ea_discount_by_people')->nullable();

            // EZ tour meta
            $table->tinyInteger('tz_enable_person_types')->nullable();
            $table->text('tz_person_types')->nullable();

            $table->tinyInteger('tz_enable_extra_price')->nullable();
            $table->text('tz_extra_price')->nullable();

            $table->text('tz_discount_by_people')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_tour_meta', function (Blueprint $table) {
            $table->dropColumn('ea_enable_person_types');
            $table->dropColumn('ea_person_types');
            $table->dropColumn('ea_enable_extra_price');
            $table->dropColumn('ea_extra_price');
            $table->dropColumn('ea_discount_by_people');
            $table->dropColumn('tz_enable_person_types');
            $table->dropColumn('tz_person_types');
            $table->dropColumn('tz_enable_extra_price');
            $table->dropColumn('tz_extra_price');
            $table->dropColumn('tz_discount_by_people');
        });
    }
}
