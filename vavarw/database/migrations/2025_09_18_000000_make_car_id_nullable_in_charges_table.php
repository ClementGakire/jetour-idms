<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCarIdNullableInChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charges', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id')->nullable()->change();
            $table->unsignedBigInteger('driver_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('charges', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id')->nullable(false)->change();
            $table->unsignedBigInteger('driver_id')->nullable(false)->change();
        });
    }
}