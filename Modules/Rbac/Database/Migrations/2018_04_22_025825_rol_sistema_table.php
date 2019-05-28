<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolSistemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('rbac_vipfe')->create('rol_sistema', function (Blueprint $table) {
            $table->integer('rol_id')->unsigned();
            $table->integer('sistema_id')->unsigned();
            
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('sistema_id')->references('id')->on('sistemas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_sistema');
    }
}
