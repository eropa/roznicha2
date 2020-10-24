<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRassostavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rassostavs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ras_id');
            $table->integer('ras_pos');
            $table->bigInteger('ass_id');
            $table->float('count_ras');
            $table->bigInteger('count_porchi');
            $table->index('ras_id');
            $table->index('ass_id');
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
        Schema::dropIfExists('rassostavs');
    }
}
