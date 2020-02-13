<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePAncianosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_ancianos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('tieneDieta');
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
        Schema::dropIfExists('p_ancianos');
    }
}
