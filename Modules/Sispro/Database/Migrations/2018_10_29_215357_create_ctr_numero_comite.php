<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtrNumeroComite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctr_numero_comite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gestion')->unsigned();
            $table->integer('numero')->unsigned();
            $table->integer('vigente')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctr_numero_comite');
    }
}
