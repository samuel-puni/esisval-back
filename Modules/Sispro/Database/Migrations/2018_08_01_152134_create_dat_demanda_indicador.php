<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaIndicador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda_indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('linea_base',15,2);
            $table->decimal('meta',15,2);
            $table->integer('indicador_id')->unsigned();
            $table->integer('demanda_sector_economico_id')->unsigned();
            $table->timestamps();

            $table->foreign('indicador_id')->references('id')->on('cla_indicador');
            $table->foreign('demanda_sector_economico_id')->references('id')->on('dat_demanda_sector_economico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_demanda_indicador');
    }
}
