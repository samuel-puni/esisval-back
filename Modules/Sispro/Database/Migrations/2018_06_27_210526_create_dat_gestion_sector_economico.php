<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatGestionSectorEconomico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_gestion_sector_economico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gestion_id')->unsigned()->nullable();
            $table->integer('sector_economico_id')->unsigned()->nullable();
            $table->integer('envio_sigma')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('sector_economico_id')->references('id')->on('dat_sector_economico');
            $table->foreign('gestion_id')->references('id')->on('sis_gestion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_gestion_sector_economico');
    }
}
