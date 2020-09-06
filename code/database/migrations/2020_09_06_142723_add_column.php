<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asses', function(Blueprint $table) {
            $table->double('price')->default(0.00);
            $table->integer('visible_ras')->default(0);
        });

        Schema::table('grasses', function(Blueprint $table) {
            $table->integer('visible_ras')->default(0);
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
