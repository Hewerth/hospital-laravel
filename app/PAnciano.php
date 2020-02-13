<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PAnciano extends Model
{
    protected $fillable = [
        'paciente_id',
        'tieneDieta',
        'estado'
    ];
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
