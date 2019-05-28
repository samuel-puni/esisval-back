<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaDemandaEstado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_demanda_estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('demanda_estado',50)->nullable();
            $table->string('abreviacion',15);
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
        Schema::dropIfExists('cla_demanda_estado');
    }
}
