<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaEtapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda_etapa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mes_inicio');
            $table->integer('duracion');
            $table->integer('demanda_grupo_componente_id')->unsigned();
            $table->integer('demanda_etapa_id')->unsigned();

            $table->foreign('demanda_grupo_componente_id')->references('id')->on('dat_demanda_grupo_componente');
            $table->foreign('demanda_etapa_id')->references('id')->on('cla_demanda_etapa');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda_etapa');
    }
}
