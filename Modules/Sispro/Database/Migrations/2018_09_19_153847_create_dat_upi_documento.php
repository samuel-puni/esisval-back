<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatUpiDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_upi_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_documento',150)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->text('observacion')->nullable();
            $table->string('documento_digital',255)->nullable();
            $table->integer('hoja_ruta_id')->unsigned();
            $table->integer('documento_id')->unsigned();
            $table->timestamps();

            $table->foreign('hoja_ruta_id')->references('id')->on('dat_upi_hoja_ruta');
            $table->foreign('documento_id')->references('id')->on('cla_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_upi_documento');
    }
}
