<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSostavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sostavs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ass_id');
            $table->bigInteger('ass_ssos_id');
            $table->float('count');
            $table->index('ass_id');
            $table->index('ass_ssos_id');
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
        Schema::dropIfExists('sostavs');
    }
}
