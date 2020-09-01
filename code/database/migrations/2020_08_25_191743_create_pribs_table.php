<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePribsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pribs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prih_id');
            $table->foreign('prih_id')->references('id')->on('prihs');
            $table->integer('pos_ass');
            $table->unsignedBigInteger('ass_id');
            $table->foreign('ass_id')->references('id')->on('asses');
            $table->double('count');
            $table->double('ostatok');
            $table->double('price_zak');
            $table->double('price_prod');
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
        Schema::dropIfExists('pribs');
    }
}
