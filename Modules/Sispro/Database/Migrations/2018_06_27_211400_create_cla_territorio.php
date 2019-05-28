<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaTerritorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_territorio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('territorio',90)->nullable();
            $table->string('abreviacion',15)->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->string('codigo_presupuestario',6)->nullable();
            $table->decimal('numero_habitantes_hombres',8,0)->nullable();
            $table->decimal('numero_habitantes_mujeres',8,0)->nullable();
            $table->decimal('numero_habitantes_area_urbana',8,0)->nullable();
            $table->decimal('numero_habitantes_area_rural',8,0)->nullable();
            $table->decimal('tasa_anual_crecimiento',8,0)->nullable();
            $table->decimal('hogares_particules',8,0)->unsigned();
            $table->decimal('tamano_promedio_hogar',8,0)->unsigned();
            $table->string('latitud',1000)->nullable();
            $table->string('longitud',1000)->nullable();
            $table->string('enfoque',10)->nullable();
            $table->decimal('distancia_limite',8,0)->nullable();
            $table->string('unidad',1)->nullable();
            $table->integer('region_territorio_id')->unsigned()->nullable();
            $table->integer('tipo_territorio_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('region_territorio_id')->references('id')->on('cla_region_territorio');
            $table->foreign('tipo_territorio_id')->references('id')->on('cla_tipo_territorio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cla_territorio');
    }
}
