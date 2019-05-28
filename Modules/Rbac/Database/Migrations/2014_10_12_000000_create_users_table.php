<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('rbac_vipfe')->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario',50)->unique();
            $table->string('password');
            $table->string('nombre',50)->nullable();
            $table->string('paterno',30)->nullable();
            $table->string('materno',30)->nullable();
            $table->string('unidad',100)->nullable();
            $table->string('cargo',100)->nullable();
            $table->string('telefono_fijo',10)->nullable();
            $table->string('telefono_movil',10)->nullable();
            $table->string('email',50)->unique()->nullable();
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
        Schema::dropIfExists('users');
    }
}
