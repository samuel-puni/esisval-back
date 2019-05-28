<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaTipoFinanciamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('cla_tipo_financiamiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_financiamiento',50);
            $table->string('abreviacion',15)->nullable();
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
        Schema::dropIfExists('cla_tipo_financiamiento');
    }
}
