<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatUpiComponente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sispro')->create('dat_upi_componente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('componente',2000);
            $table->integer('upi_id')->unsigned();
            $table->timestamps();

            $table->foreign('upi_id')->references('id')->on('dat_upi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}
