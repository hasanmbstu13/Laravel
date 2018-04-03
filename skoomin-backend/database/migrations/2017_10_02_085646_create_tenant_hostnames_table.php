<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantHostnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_hostnames', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id');
            $table->char('hostname');
            $table->tinyInteger('status')->default(1)->comment = "0 = cancelled, 1=active";
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
        Schema::dropIfExists('tenant_hostnames');
    }
}
