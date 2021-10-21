<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_points', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('finished')->nullable();
            $table->dateTime('valid_till', $precision = 0)->nullable();
            $table->bigInteger('points_amount')->nullable();
            $table->unsignedBigInteger('point_id');
            $table->foreign('point_id')
                ->references('id')
                ->on('points')
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
        Schema::dropIfExists('my_points');
    }
}
