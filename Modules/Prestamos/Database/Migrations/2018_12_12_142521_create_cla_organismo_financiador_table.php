<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaOrganismoFinanciadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('cla_organismo_financiador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organismo_financiador',200);
            $table->string('abreviacion',10)->nullable();
            $table->string('codigo_presupuestario',10)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->integer('organismo_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('organismo_id')->references('id')->on('cla_organismo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cla_organismo_financiador');
    }
}
