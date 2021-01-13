<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciertosMediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conciertos_medios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medio');
            $table->foreign('id_medio')->references('id')->on('medios');
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
        Schema::dropIfExists('conciertos_medios');
    }
}
