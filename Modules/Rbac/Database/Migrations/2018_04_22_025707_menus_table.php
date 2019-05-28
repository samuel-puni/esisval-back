<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('rbac_vipfe')->create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu',30);
            $table->string('descripcion',100)->nullable();
            $table->integer('orden')->unsigned()->nullable();
            $table->string('ruta',100)->nullable();
            $table->string('tipo',30)->nullable();
            $table->integer('nivel')->unsigned()->nullable();
            $table->string('icono',100)->nullable();
            $table->integer('vigente')->unsigned()->default(1);
            $table->integer('menu_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
