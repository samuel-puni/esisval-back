<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaIndicador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_indicador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('indicador',500);
            $table->string('abreviacion',15)->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->integer('tipo_indicador_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_indicador_id')->references('id')->on('cla_tipo_indicador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cla_indicador');
    }
}
