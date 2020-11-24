<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZaivkabodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zaivkabodies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('zaivka_id');
            $table->index('zaivka_id');
            $table->bigInteger('ass_id');
            $table->index('ass_id');
            $table->float('count_toval');
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
        Schema::dropIfExists('zaivkabodies');
    }
}
