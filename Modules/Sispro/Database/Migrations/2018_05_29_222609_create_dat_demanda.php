<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemanda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_sispro',10)->nullable();
            $table->string('objeto',255)->nullable();
            $table->string('localizacion',255)->nullable();
            $table->string('nombre_demanda',2000)->nullable();
            $table->text('problema')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('objetivo_general')->nullable();
            $table->text('objetivo_especifico')->nullable();
            $table->string('usuario',100)->nullable();
            $table->integer('entidad_id')->unsigned();
            $table->integer('tipo_demanda_id')->unsigned();
            $table->integer('accion_inversion_id')->unsigned()->nullable();
            $table->integer('demanda_estado_id')->unsigned();
            $table->timestamps();

            $table->foreign('entidad_id')->references('id')->on('dat_entidad');
            $table->foreign('tipo_demanda_id')->references('id')->on('cla_tipo_demanda');
            $table->foreign('accion_inversion_id')->references('id')->on('cla_accion_inversion');
            $table->foreign('demanda_estado_id')->references('id')->on('cla_demanda_estado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda');
    }
}
