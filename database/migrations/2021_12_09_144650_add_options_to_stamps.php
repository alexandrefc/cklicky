<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOptionsToStamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stamps', function (Blueprint $table) {
            $table->string('image_fs_path')->nullable();    
            $table->string('video_yt_id')->nullable(); 
            $table->string('manager_email', 100);
            $table->bigInteger('x_time_to_redeem')->nullable;
            $table->string('type_of_period_to_redeem')->nullable;
            $table->bigInteger('total_stamps')->nullable;
            $table->dateTime('start_date', $precision = 0)->nullable();
            $table->dateTime('end_date', $precision = 0)->nullable();
            $table->bigInteger('reset_time')->nullable;
            $table->string('type_of_reset_time')->nullable;
            $table->string('available_through')->nullable;
            $table->bigInteger('reward_id')->nullable();
            $table->json('scheduled_days')->nullable(); 
            $table->json('age')->nullable(); 
            $table->string('gender')->nullable(); 
            $table->unsignedBigInteger('category_id')->nullable();
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
        Schema::table('stamps', function (Blueprint $table) {
            //
        });
    }
}
