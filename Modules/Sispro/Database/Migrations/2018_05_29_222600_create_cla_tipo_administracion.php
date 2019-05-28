<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaTipoAdministracion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_tipo_administracion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_administracion',60);
            $table->string('abreviacion',30);
            $table->string('descripcion',600)->nullable();
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
        Schema::dropIfExists('cla_tipo_administracion');
    }
}
