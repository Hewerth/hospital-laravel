<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'cantPacientes',
        'nombreEspecialista',
        'tipoConsulta', 
        'estado'
    ];

    const ESTADO = ['OCUPADA','EN ESPERA'];
    const TIPO_CONSULTA = ['PEDIATRIA', 'URGENCIA', 'CGI'];

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }

    public function estados(){
        return $this->estados == Consulta::ESTADOS;
    }
}
