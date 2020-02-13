<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PJoven extends Model
{
    protected $fillable = [
        'paciente_id',
        'fumador',
        'tiempo_fumador',
        'estado'
    ];
    
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
