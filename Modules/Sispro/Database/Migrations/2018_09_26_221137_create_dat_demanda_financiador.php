<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaFinanciador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dat_demanda_financiador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('demanda_financiador',500);
            $table->string('abreviacion',30)->nullable();
            $table->string('descripcion',800)->nullable();
            $table->string('codigo_presupuestario',50)->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->integer('tipo_financiador_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_financiador_id')->references('id')->on('cla_tipo_financiador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda_financiador');
    }
}
