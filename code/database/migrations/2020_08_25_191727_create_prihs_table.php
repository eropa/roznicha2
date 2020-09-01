<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prihs', function (Blueprint $table) {
            $table->id();
            $table->timestamp('dataprixod');
            $table->timestamp('datapay')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('pos_id');
            $table->foreign('pos_id')->references('id')->on('pos');
            $table->unsignedBigInteger('point_id');
            $table->foreign('point_id')->references('id')->on('points');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('str_rasxod');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prihs');
    }
}
