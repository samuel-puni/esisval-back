<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDesembolso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_desembolso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carta_solicitud',100);
            $table->date('fecha_ingreso')->nullable();
            $table->string('solicitud_pago',100)->nullable();
            $table->date('fecha_pago')->nullable();
            $table->decimal('importe',12,2)->default(0);
            $table->decimal('tipo_cambio',12,2)->default(0);
            $table->text('concepto_desembolso')->nullable();
            $table->integer('componente_convenio_id')->unsigned();
            $table->timestamps();

            $table->foreign('componente_convenio_id')->references('id')->on('dat_componente_convenio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_desembolso');
    }
}
