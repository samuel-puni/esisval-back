<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatContratoPrestamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_contrato_prestamo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',100)->nullable();
            $table->string('nombre',200);
            $table->string('documento_digital',255)->nullable();
            $table->string('usuario',100)->nullable();
            $table->integer('tipo_moneda_id')->unsigned()->nullable();
            $table->integer('organismo_financiador_id')->unsigned();
            $table->integer('vigente')->unsigned()->default(1);
            $table->timestamps();

            $table->foreign('tipo_moneda_id')->references('id')->on('cla_tipo_moneda');
            $table->foreign('organismo_financiador_id')->references('id')->on('cla_organismo_financiador');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_contrato_prestamo');
    }
}
