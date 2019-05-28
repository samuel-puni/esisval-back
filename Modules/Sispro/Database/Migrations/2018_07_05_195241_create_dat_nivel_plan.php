<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatNivelPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_nivel_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nivel_plan',30);
            $table->integer('orden')->unsigned()->nullable();
            $table->integer('habilitado_inversion')->unsigned()->nullable();
            $table->integer('plan_id')->unsigned()->nullable();

            $table->foreign('plan_id')->references('id')->on('dat_plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_nivel_plan');
    }
}
