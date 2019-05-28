<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_documento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento',100)->nullable();
            $table->string('abreviacion',30);
            $table->integer('vigente')->unsigned()->default(1);
            $table->integer('tipo_documento_id')->unsigned();

            $table->foreign('tipo_documento_id')->references('id')->on('cla_tipo_documento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cla_documento');
    }
}
