<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatEntidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_entidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sigla',30);
            $table->string('entidad',120)->nullable();
            $table->string('codigo_presupuestario',4)->nullable();
            $table->integer('entidad_id')->unsigned()->nullable();
            $table->string('nombre_corto',100)->nullable();
            $table->integer('vigente')->unsigned();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_entidad');
    }
}
