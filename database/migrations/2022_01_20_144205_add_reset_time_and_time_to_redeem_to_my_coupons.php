<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResetTimeAndTimeToRedeemToMyCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_coupons', function (Blueprint $table) {
            $table->dateTime('user_time_to_redeem', $precision = 0)->nullable();
            $table->dateTime('user_reset_time', $precision = 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_coupons', function (Blueprint $table) {
            //
        });
    }
}
