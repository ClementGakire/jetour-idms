<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDriverAndAdvanceToPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->integer('driver_id')->unsigned()->nullable()->after('car_id');
            $table->double('advance')->nullable()->after('driver_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'advance')) {
                $table->dropColumn('advance');
            }
            if (Schema::hasColumn('payments', 'driver_id')) {
                $table->dropColumn('driver_id');
            }
        });
    }
}
