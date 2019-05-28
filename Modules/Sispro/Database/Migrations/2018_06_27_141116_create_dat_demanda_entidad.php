<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaEntidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda_entidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entidad_id')->unsigned();
            $table->integer('demanda_id')->unsigned();
            $table->integer('demanda_tipo_entidad_id')->unsigned();
            $table->timestamps();

            $table->foreign('entidad_id')->references('id')->on('dat_entidad');
            $table->foreign('demanda_id')->references('id')->on('dat_demanda');
            $table->foreign('demanda_tipo_entidad_id')->references('id')->on('cla_demanda_tipo_entidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda_entidad');
    }
}
