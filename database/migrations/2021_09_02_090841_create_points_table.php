<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('image_path');
            $table->string('qrcode_path');
            $table->bigInteger('add_x_points')->nullable()->default(1);
            $table->dateTime('valid_till', $precision = 0)->nullable();
            $table->unsignedBigInteger('made_by_id');
            $table->foreign('made_by_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('venue_id')->nullable();
            $table->foreign('venue_id')
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
        Schema::dropIfExists('points');
    }
}
