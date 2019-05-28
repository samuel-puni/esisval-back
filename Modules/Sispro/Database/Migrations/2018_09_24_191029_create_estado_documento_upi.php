<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelEstadoDocumentoUpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_estado_documento_upi', function (Blueprint $table) {
            $table->integer('estado_documento_id')->unsigned();
            $table->integer('upi_id')->unsigned();
            
            $table->foreign('estado_documento_id')->references('id')->on('cla_estado_documento');
            $table->foreign('upi_id')->references('id')->on('dat_upi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_estado_documento_upi');
    }
}
