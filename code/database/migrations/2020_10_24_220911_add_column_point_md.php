<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPointMd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rassostavs', function (Blueprint $table) {
            $table->bigInteger('point_id');
            $table->index('point_id');
        });
        Schema::table('rasbs', function (Blueprint $table) {
            $table->bigInteger('point_id');
            $table->index('point_id');
        });
        Schema::table('pribs', function (Blueprint $table) {
            $table->bigInteger('point_id');
            $table->index('point_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
