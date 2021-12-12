<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyStampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_stamps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('finished')->nullable();
            $table->dateTime('valid_till', $precision = 0)->nullable();
            $table->bigInteger('stamps_amount')->nullable();
            $table->string('add_stamps_qrcode_path');
            $table->dateTime('user_time_to_redeem', $precision = 0)->nullable();
            $table->dateTime('user_reset_time', $precision = 0)->nullable();
            $table->unsignedBigInteger('stamp_id');
            $table->foreign('stamp_id')
                ->references('id')
                ->on('stamps')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('manage_by_venue')->nullable();
            $table->foreign('manage_by_venue')
                ->references('id')
                ->on('venues')
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
        Schema::dropIfExists('my_stamps');
    }
}
