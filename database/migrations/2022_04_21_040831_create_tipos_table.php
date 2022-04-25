<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->string('tipo')->primary();
            $table->timestamps();
            $table->decimal('precio_minuto', 2, 2);
            
        });

        DB::table('tipos')->insert(
            array(
                'tipo' => 'oficial',
                'precio_minuto' => 00.00
            )
        );

        DB::table('tipos')->insert(
            array(
                'tipo' => 'residente',
                'precio_minuto' => 00.05
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
}
