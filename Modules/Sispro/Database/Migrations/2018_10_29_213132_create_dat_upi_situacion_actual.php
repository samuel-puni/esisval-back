<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatUpiSituacionActual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dat_upi_situacion_actual', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->text('observacion')->nullable();
            $table->integer('upi_id')->unsigned();
            $table->integer('estado_situacion_id')->unsigned();

            $table->foreign('upi_id')->references('id')->on('dat_upi');
            $table->foreign('estado_situacion_id')->references('id')->on('cla_estado_situacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_upi_situacion_actual');
    }
}
