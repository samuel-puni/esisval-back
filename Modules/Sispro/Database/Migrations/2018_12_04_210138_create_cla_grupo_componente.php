<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaGrupoComponente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_grupo_componente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grupo_componente',100);
            $table->string('abreviacion',15)->nullable();
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
        Schema::dropIfExists('cla_grupo_componente');
    }
}
