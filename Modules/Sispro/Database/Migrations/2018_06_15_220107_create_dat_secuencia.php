<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatSecuencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_secuencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tabla',30);
            $table->integer('secuencia')->unsigned();
            $table->string('descripcion',600);
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
        Schema::dropIfExists('dat_secuencia');
    }
}
