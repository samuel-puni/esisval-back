<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatComponente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_componente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('componente',200);
            $table->string('abreviacion',50)->nullable();
            $table->integer('contrato_prestamo_id')->unsigned();
            $table->integer('componente_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('contrato_prestamo_id')->references('id')->on('dat_contrato_prestamo');
            $table->foreign('componente_id')->references('id')->on('dat_componente');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_componente');
    }
}
