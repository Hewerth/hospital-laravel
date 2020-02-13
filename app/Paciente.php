<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $fillable = [
        'nombre', 
        'edad'
    ];

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }

    public function anciano(){
        return $this->hasOne(PAnciano::class);
    }

    public function nino(){
        return $this->hasOne(PNinnos::class);
    }

    public function joven(){
        return $this->hasOne(PJoven::class);
    }

    public function atencion_pacientes(){
        return $this->belongsTo(Atencion_pacientes::class);
    }
}
