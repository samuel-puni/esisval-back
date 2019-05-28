<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatEntidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_entidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sigla',30);
            $table->string('entidad',120)->nullable();
            $table->string('codigo_presupuestario',4)->nullable();
            $table->integer('entidad_id')->unsigned()->nullable();
            $table->string('nombre_corto',100)->nullable();
            $table->integer('tipo_entidad_id')->unsigned();
            $table->integer('tipo_administracion_id')->unsigned();
            $table->integer('tipo_nivel_id')->unsigned();
            $table->integer('vigente')->unsigned();
            $table->timestamps();

            //$table->foreign('entidad_id')->references('id')->on('dat_entidad');
            $table->foreign('tipo_entidad_id')->references('id')->on('cla_tipo_entidad');
            $table->foreign('tipo_administracion_id')->references('id')->on('cla_tipo_administracion');
            $table->foreign('tipo_nivel_id')->references('id')->on('cla_tipo_nivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_entidad');
    }
}
