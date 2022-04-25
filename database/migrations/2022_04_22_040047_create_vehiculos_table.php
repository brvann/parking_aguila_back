<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->char('placa', 16)->primary(); 
            $table->char('descripcion', 100)->nullable();
            $table->string('tipo');
            
            $table->timestamps();
            //nuevas
            $table->integer('tiempo_total')->default(0);
            $table->decimal('saldo_vencido', 6, 2)->default(00.00);

            $table->foreign('tipo')->references('tipo')->on('tipos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
