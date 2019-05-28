<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaMoneda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_moneda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('moneda',50);
            $table->string('abreviacion',15)->nullable();
            $table->decimal('tipo_cambio', 12, 2);
            $table->integer('vigente')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cla_moneda');
    }
}
