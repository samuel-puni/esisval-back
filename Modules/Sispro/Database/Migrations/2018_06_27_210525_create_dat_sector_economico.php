<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatSectorEconomico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_sector_economico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sector_economico',90)->nullable();
            $table->string('abreviacion',30)->nullable();
            $table->string('codigo_presupuestario',7)->nullable();
            $table->integer('sector_economico_id')->unsigned()->nullable();
            $table->integer('tipo_sector_economico_id')->unsigned()->nullable();
            $table->integer('grupo_sector_economico_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('sector_economico_id')->references('id')->on('dat_sector_economico');
            $table->foreign('tipo_sector_economico_id')->references('id')->on('cla_tipo_sector_economico');
            $table->foreign('grupo_sector_economico_id')->references('id')->on('cla_grupo_sector_economico');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_sector_economico');
    }
}
