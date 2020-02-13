<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PNinno extends Model
{
    protected $fillable = [
        'paciente_id',
        'relacionPesoEstatura',
        'prioridad',
        'riesgo',
        'estado'
    ];
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
