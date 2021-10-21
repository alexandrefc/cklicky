<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_options', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('total_points')->nullable;
            $table->bigInteger('add_x_points')->nullable()->default(1);
            $table->dateTime('start_time', $precision = 0)->nullable();
            $table->dateTime('end_time', $precision = 0)->nullable();
            $table->bigInteger('reset_time')->nullable;
            $table->string('type_of_reset_time')->nullable;
            $table->bigInteger('x_time_to_redeem')->nullable;
            $table->string('type_of_period_to_redeem')->nullable;
            $table->string('available_through')->nullable;
            $table->unsignedBigInteger('point_id');
            $table->foreign('point_id')
                ->references('id')
                ->on('points')
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
        Schema::dropIfExists('point_options');
    }
}
