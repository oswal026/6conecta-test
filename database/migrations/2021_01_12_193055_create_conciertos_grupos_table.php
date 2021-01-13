<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciertosGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciertos_grupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->unsignedBigInteger('id_concierto');
            $table->foreign('id_concierto')->references('id')->on('conciertos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conciertos_grupos');
    }
}

