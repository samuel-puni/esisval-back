<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatUpiHojaRuta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dat_upi_hoja_ruta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoja_ruta',150)->nullable();
            $table->date('fecha_ingreso_mpd')->nullable();
            $table->text('fecha_ingreso_upi')->nullable();
            $table->integer('upi_id')->unsigned();

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
        Schema::dropIfExists('dat_upi_hoja_ruta');
    }
}
