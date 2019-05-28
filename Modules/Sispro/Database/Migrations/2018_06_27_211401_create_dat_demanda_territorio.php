<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaTerritorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda_territorio', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('porcentaje_cobertura',18,2)->nullable();
            $table->integer('poblacion_beneficiada')->nullable();
            $table->integer('localizacion_geografica')->nullable()->default(1);
            $table->integer('area_influencia')->nullable()->default(1);
            $table->integer('demanda_id')->unsigned()->nullable();
            $table->integer('territorio_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('demanda_id')->references('id')->on('dat_demanda');
            $table->foreign('territorio_id')->references('id')->on('cla_territorio');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda_territorio');
    }
}
