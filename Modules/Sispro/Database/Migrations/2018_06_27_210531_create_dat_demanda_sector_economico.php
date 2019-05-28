<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatDemandaSectorEconomico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_demanda_sector_economico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('demanda_id')->unsigned()->nullable();
            $table->integer('sector_economico_id')->unsigned()->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->timestamps();

            $table->foreign('demanda_id')->references('id')->on('dat_demanda');
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
        Schema::dropIfExists('dat_demanda_sector_economico');
    }
}
