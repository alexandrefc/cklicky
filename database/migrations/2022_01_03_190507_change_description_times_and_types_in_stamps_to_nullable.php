<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDescriptionTimesAndTypesInStampsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stamps', function (Blueprint $table) {
            $table->bigInteger('x_time_to_redeem')->nullable()->change();
            $table->string('type_of_period_to_redeem')->nullable()->change();
            $table->bigInteger('reset_time')->nullable()->change();
            $table->string('type_of_reset_time')->nullable()->change();
            $table->longText('description')->nullable()->change();
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
