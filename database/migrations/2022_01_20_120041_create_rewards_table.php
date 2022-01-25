<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('reward_id')->nullable();
            $table->bigInteger('points_amount');
            $table->unsignedBigInteger('point_id')->nullable();
            $table->foreign('point_id')
                ->references('id')
                ->on('points')
                ->onDelete('cascade');
            $table->unsignedBigInteger('stamp_id')->nullable();
            $table->foreign('stamp_id')
                ->references('id')
                ->on('stamps')
                ->onDelete('cascade');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons')
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
        Schema::dropIfExists('rewards');
    }
}
