<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorSectorEconomico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('rel_indicador_sector_economico', function (Blueprint $table) {
            $table->integer('indicador_id')->unsigned();
            $table->integer('sector_economico_id')->unsigned();
            
            $table->foreign('indicador_id')->references('id')->on('cla_indicador');
            $table->foreign('sector_economico_id')->references('id')->on('dat_sector_economico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_indicador_sector_economico');
    }
}
