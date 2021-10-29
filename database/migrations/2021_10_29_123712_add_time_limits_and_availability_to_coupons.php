<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeLimitsAndAvailabilityToCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->bigInteger('reward_id')->nullable();
            $table->string('available_through')->nullable;
            $table->dateTime('start_date', $precision = 0)->nullable();
            $table->dateTime('end_date', $precision = 0)->nullable();
            $table->bigInteger('x_time_to_redeem')->nullable;
            $table->string('type_of_period_to_redeem')->nullable;
            $table->bigInteger('reset_time')->nullable;
            $table->string('type_of_reset_time')->nullable;
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            //
        });
    }
}
