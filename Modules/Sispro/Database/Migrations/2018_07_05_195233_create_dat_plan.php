<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan',100);
            $table->string('abreviacion',15)->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->integer('tipo_plan_id')->unsigned()->nullable();

            $table->foreign('tipo_plan_id')->references('id')->on('cla_tipo_plan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_plan');
    }
}
