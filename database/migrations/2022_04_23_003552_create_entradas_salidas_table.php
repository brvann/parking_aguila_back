<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas_salidas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('placa', 16);
            $table->time('hora_entrada', 0)->nullable();
            $table->time('hora_salida', 0)->nullable();
            //nuevas
            $table->boolean('eliminado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas_salidas');
    }
}
