<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatProgramacionPrestamo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_programacion_prestamo', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('presupuesto_inicial',12,2)->default(0);
            $table->decimal('presupuesto_modificado',12,2)->default(0);
            $table->decimal('presupuesto_vigente',12,2)->default(0);
            $table->decimal('comprometido',12,2)->default(0);
            $table->decimal('ejecutado',12,2)->default(0);
            $table->integer('componente_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('dat_programacion_prestamo');
    }
}
