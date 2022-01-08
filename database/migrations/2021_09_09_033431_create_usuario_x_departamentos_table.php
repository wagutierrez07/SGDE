<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioXDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_x_departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('usxdp_descripcion');
            $table->boolean('usxdp_estatus');
            $table->integer('usxdp_uscedula');
            $table->integer('usxdp_dpid');
            //$table->foreign('usxdp_uscedula')->references('cedula')->on('users');
            //$table->foreign('usxdp_dpid')->references('id')->on('departamentos');
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
        Schema::dropIfExists('usuario_x_departamentos');
    }
}
