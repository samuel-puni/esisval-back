<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaGrupoComponente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda_grupo_componente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->integer('demanda_sector_economico_id')->unsigned();
            $table->integer('grupo_componente_id')->unsigned();

            $table->foreign('demanda_sector_economico_id')->references('id')->on('dat_demanda_sector_economico');
            $table->foreign('grupo_componente_id')->references('id')->on('cla_grupo_componente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda_grupo_componente');
    }
}
