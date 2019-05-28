<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelNodoPlanUpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_nodo_plan_upi', function (Blueprint $table) {
            $table->integer('nodo_plan_id')->unsigned();
            $table->integer('upi_id')->unsigned();
            
            $table->foreign('nodo_plan_id')->references('id')->on('dat_nodo_plan');
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
        Schema::dropIfExists('rel_nodo_plan_upi');
    }
}
