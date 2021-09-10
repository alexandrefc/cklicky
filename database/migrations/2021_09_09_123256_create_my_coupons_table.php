<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_coupons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('redeemed')->nullable();
            $table->dateTime('valid_till', $precision = 0)->nullable();
            $table->unsignedBigInteger('coupon_id');
            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('manage_by_venue')->nullable();
            $table->foreign('manage_by_venue')
                ->references('id')
                ->on('venues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_coupons');
    }
}
