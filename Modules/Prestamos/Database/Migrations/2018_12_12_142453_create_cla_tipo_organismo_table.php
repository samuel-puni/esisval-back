<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaTipoOrganismoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('cla_tipo_organismo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_organismo',200);
            $table->string('abreviacion',10)->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('cla_tipo_organismo');
    }
}
