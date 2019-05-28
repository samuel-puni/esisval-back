<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('rbac_vipfe')->create('permiso_rol', function (Blueprint $table) {
            $table->integer('permiso_id')->unsigned();
            $table->integer('rol_id')->unsigned();
            
            $table->foreign('permiso_id')->references('id')->on('permisos');
            $table->foreign('rol_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso_rol');
    }
}
