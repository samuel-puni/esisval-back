<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatComponenteConvenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('prestamo')->create('dat_componente_convenio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('componente_convenio',200);
            $table->decimal('monto_presupuestado',12,2)->default(0);
            $table->decimal('monto_ejecutado',12,2)->default(0);
            $table->integer('convenio_id')->unsigned();
            $table->integer('componente_id')->unsigned();
            $table->timestamps();

            $table->foreign('convenio_id')->references('id')->on('dat_convenio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dat_componente_convenio');
    }
}
