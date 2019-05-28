<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisGestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('sis_gestion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gestion')->unsigned();
            $table->tinyInteger('cierre');
            $table->decimal('tipo_cambio',5,2);
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
        Schema::dropIfExists('sis_gestion');
    }
}
