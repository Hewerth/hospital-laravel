<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantPacientes')->default(0);
            $table->string('nombreEspecialista');
            $table->enum('tipoConsulta', ['PEDIATRIA', 'URGENCIA', 'CGI']);
            $table->enum('estado', ['OCUPADA', 'EN ESPERA'])->default('EN ESPERA');

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
        Schema::dropIfExists('consultas');
    }
}
