<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatEstadoSituacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_estado_situacion', function (Blueprint $table) {
            $table->increments('id');
            $table->text('estado_situacion');
            $table->date('fecha')->nullable();
            $table->integer('convenio_id')->unsigned();
            $table->timestamps();

            $table->foreign('convenio_id')->references('id')->on('dat_convenio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_estado_situacion');
    }
}
