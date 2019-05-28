<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaDemandaEtapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_demanda_etapa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('demanda_etapa',100);
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
        Schema::dropIfExists('cla_demanda_etapa');
    }
}
