<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('barcode',13)->default('')->nullable();
            $table->boolean('sostav')->default(0);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('grass_id');
            $table->foreign('grass_id')->references('id')->on('grasses');
            $table->index(['barcode', 'grass_id']);
            $table->index(['name']);
            $table->index(['grass_id']);
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
        Schema::dropIfExists('asses');
    }
}
