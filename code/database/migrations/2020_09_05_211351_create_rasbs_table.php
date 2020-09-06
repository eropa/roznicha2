<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRasbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rasbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rash_id');
            $table->foreign('rash_id')->references('id')->on('rashes');
            $table->integer('pos_ass');
            $table->unsignedBigInteger('ass_id');
            $table->foreign('ass_id')->references('id')->on('asses');
            $table->double('count');
            $table->double('price');
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
        Schema::dropIfExists('rasbs');
    }
}
