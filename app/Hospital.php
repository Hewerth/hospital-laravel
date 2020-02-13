<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable= [
        'consulta_id',
        'paciente_id'
    ];

    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }

    public function consultas(){
        return $this->hasMany(Consulta::class);
    }
}
