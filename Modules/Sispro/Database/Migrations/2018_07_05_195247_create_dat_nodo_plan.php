<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatNodoPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_nodo_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nodo_plan',8000);
            $table->string('codigo_presupuestario',14)->nullable();
            $table->integer('nodo_plan_id')->unsigned()->nullable();
            $table->integer('nivel_plan_id')->unsigned()->nullable();

            $table->foreign('nodo_plan_id')->references('id')->on('dat_nodo_plan');
            $table->foreign('nivel_plan_id')->references('id')->on('dat_nivel_plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_nodo_plan');
    }
}
