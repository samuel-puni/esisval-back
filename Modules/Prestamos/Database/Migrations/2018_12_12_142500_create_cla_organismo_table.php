<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaOrganismoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('cla_organismo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organismo',200);
            $table->string('abreviacion',10)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->integer('tipo_organismo_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_organismo_id')->references('id')->on('cla_tipo_organismo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cla_organismo');
    }
}
