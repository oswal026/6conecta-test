<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciertosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciertos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_promotor');
            $table->foreign('id_promotor')->references('id')->on('promotores');
            $table->unsignedBigInteger('id_recinto');
            $table->foreign('id_recinto')->references('id')->on('recintos');
            $table->string('nombre', 255);
            $table->integer('numero_espectadores');
            $table->date('fecha');
            $table->integer('rentabilidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conciertos');
    }
}
