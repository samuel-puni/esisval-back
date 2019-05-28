<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelTerritorioUpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_territorio_upi', function (Blueprint $table) {
            $table->integer('territorio_id')->unsigned();
            $table->integer('upi_id')->unsigned();
            
            $table->foreign('territorio_id')->references('id')->on('cla_territorio');
            $table->foreign('upi_id')->references('id')->on('dat_upi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_territorio_upi');
    }
}
