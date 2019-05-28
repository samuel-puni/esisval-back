<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('rbac_vipfe')->create('sistemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sistema',30);
            $table->string('descripcion',100)->nullable();
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
        Schema::dropIfExists('sistemas');
    }
}
