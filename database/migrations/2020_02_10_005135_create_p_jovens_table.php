<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePJovensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_jovens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('fumador');
            $table->integer('tiempo_fumador')->nullable();
            $table->integer('prioridad');
            $table->float('riesgo');
            $table->unsignedBigInteger('paciente_id');
            
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
        Schema::dropIfExists('p_jovens');
    }
}
