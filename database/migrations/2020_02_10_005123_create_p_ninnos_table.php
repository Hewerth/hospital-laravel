<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePNinnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_ninnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('relacionPesoEstatura');
            $table->unsignedBigInteger('paciente_id');
            $table->integer('prioridad');
            $table->float('riesgo');
            //Relacion
            $table->foreign('paciente_id')->references('id')->on('pacientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('p_ninnos');
    }
}
