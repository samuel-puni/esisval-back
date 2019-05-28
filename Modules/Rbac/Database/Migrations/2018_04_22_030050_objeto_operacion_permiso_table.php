<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjetoOperacionPermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('rbac_vipfe')->create('objeto_operacion_permiso', function (Blueprint $table) {
            $table->integer('permiso_id')->unsigned();
            $table->integer('objeto_id')->unsigned();
            $table->integer('operacion_id')->unsigned();
            
            $table->foreign('permiso_id')->references('id')->on('permisos');
            $table->foreign('objeto_id')->references('id')->on('objetos');
            $table->foreign('operacion_id')->references('id')->on('operaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objeto_operacion_permiso');
    }
}
