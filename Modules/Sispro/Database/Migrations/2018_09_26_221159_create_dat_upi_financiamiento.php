<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatUpiFinanciamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dat_upi_financiamiento', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monto', 12, 2);
            $table->integer('demanda_financiador_id')->unsigned();
            $table->integer('upi_componente_id')->unsigned();
            $table->integer('tipo_financiamiento_id')->unsigned();
            $table->timestamps();

            $table->foreign('demanda_financiador_id')->references('id')->on('dat_demanda_financiador');
            $table->foreign('upi_componente_id')->references('id')->on('dat_upi_componente');
            $table->foreign('tipo_financiamiento_id')->references('id')->on('cla_tipo_financiamiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_upi_financiamiento');
    }
}

