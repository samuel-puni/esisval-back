<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaTipoDemanda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_tipo_demanda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_demanda',100)->nullable();
            $table->string('abreviacion',10);
            $table->string('descripcion',500);
            $table->integer('vigente')->unsigned()->default(1);
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
        Schema::dropIfExists('cla_tipo_demanda');
    }
}
