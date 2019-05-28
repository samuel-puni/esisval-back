<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorUnidadMedida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('rel_indicador_unidad_medida', function (Blueprint $table) {
            $table->integer('indicador_id')->unsigned();
            $table->integer('unidad_medida_id')->unsigned();
            
            $table->foreign('indicador_id')->references('id')->on('cla_indicador');
            $table->foreign('unidad_medida_id')->references('id')->on('cla_unidad_medida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_indicador_unidad_medida');
    }
}
