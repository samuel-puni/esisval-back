<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatUpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_upi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_upi',2000)->nullable();
            $table->string('responsable',150)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('entidad_id')->unsigned();
            $table->integer('tipo_requerimiento_id')->unsigned();
            $table->string('hoja_ruta',150)->nullable();
            $table->date('fecha_ingreso_mpd')->nullable();
            $table->date('fecha_ingreso_upi')->nullable();
            $table->string('carta_entidad',150)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->text('observacion')->nullable();
            $table->integer('estado_programa_id')->unsigned();
            $table->integer('moneda_inicial_id')->unsigned()->default(5);
            $table->decimal('tipo_cambio_inicial', 12, 2)->default(1);
            $table->integer('moneda_ajustada_id')->unsigned()->default(5);
            $table->integer('etapa_upi_id')->unsigned();
            $table->decimal('tipo_cambio_ajustada', 12, 2)->default(1);
            $table->integer('estado_situacion_id')->unsigned();
            $table->string('sisfin',15)->nullable();
            $table->text('observacion_dggfe')->nullable();
            $table->text('descripcion_dggfe')->nullable();
            $table->text('repago')->nullable();
            $table->text('observacion_financiamiento')->nullable();
            $table->string('numero_comite',100)->nullable();
            
            $table->timestamps();

            $table->foreign('entidad_id')->references('id')->on('dat_entidad');
            $table->foreign('tipo_requerimiento_id')->references('id')->on('cla_tipo_requerimiento');
            $table->foreign('estado_programa_id')->references('id')->on('cla_estado_programa');
            $table->foreign('estado_situacion_id')->references('id')->on('cla_estado_situacion');
            $table->foreign('moneda_inicial_id')->references('id')->on('cla_moneda');
            $table->foreign('moneda_ajustada_id')->references('id')->on('cla_moneda');
            $table->foreign('etapa_upi_id')->references('id')->on('cla_etapa_upi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_upi');
    }
}
