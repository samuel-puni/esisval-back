<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('demanda_sector_economico_id')->unsigned()->nullable();
            $table->integer('pilar_id')->unsigned()->nullable();
            $table->integer('meta_id')->unsigned()->nullable();
            $table->integer('resultado_id')->unsigned()->nullable();
            $table->integer('accion_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('demanda_sector_economico_id')->references('id')->on('dat_demanda_sector_economico');
            $table->foreign('pilar_id')->references('id')->on('dat_nodo_plan');
            $table->foreign('meta_id')->references('id')->on('dat_nodo_plan');
            $table->foreign('resultado_id')->references('id')->on('dat_nodo_plan');
            $table->foreign('accion_id')->references('id')->on('dat_nodo_plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda_plan');
    }
}
