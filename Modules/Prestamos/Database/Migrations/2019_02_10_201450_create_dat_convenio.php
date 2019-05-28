<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatConvenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_convenio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('convenio',200);
            $table->string('estudio',200);
            $table->decimal('monto_financiamiento',12,2)->default(0);
            $table->decimal('monto_ejecutado',12,2)->default(0);
            $table->date('fecha_emision')->nullable();
            $table->integer('contrato_prestamo_id')->unsigned();
            $table->integer('entidad_id')->unsigned();
            $table->integer('tipo_moneda_id')->unsigned();
            $table->integer('etapa_id')->unsigned();
            $table->string('usuario',100);
            $table->timestamps();

            $table->foreign('contrato_prestamo_id')->references('id')->on('dat_contrato_prestamo');
            $table->foreign('entidad_id')->references('id')->on('dat_entidad');
            $table->foreign('tipo_moneda_id')->references('id')->on('cla_tipo_moneda');
            $table->foreign('etapa_id')->references('id')->on('cla_etapa');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_convenio');
    }
}
