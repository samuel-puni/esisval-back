<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaTipoRequerimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_tipo_requerimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_requerimiento',30);
            $table->string('abreviacion',15)->nullable();
            $table->string('descripcion',600)->nullable();
            $table->integer('vigente')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cla_tipo_requerimiento');
    }
}
