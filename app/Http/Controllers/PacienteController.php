<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\PAnciano;
use App\PJoven;
use App\PNinno;
use App\Atencion;
use App\Http\Requests\PacienteRequest;
use App\Http\Requests\PNinnoRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();

        return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente;
        $paciente->nombre = $request->nombre;
        $paciente->edad = $request->edad;
        $paciente->save();
        
        if($paciente->edad <= 15){
            $this->nino($request,$paciente->id, $paciente->edad);
            return redirect()->route('pacientes.index')->with('info', 'Paciente Niño ingresado correctamente.');
        }
        if($paciente->edad >=16 && $paciente->edad <=40){
           $this->joven($request,$paciente->id, $paciente->edad);
   
           return redirect()->route('pacientes.index')->with('info', 'Paciente Joven ingresado correctamente.');
        }
        if($paciente->edad>=41){
            
           $this->anciano($request,$paciente->id, $paciente->edad);
        
           return redirect()->route('pacientes.index')->with('info', 'Paciente Anciano ingresado correctamente.');
        }
        
    }

    public function nino($request, $id, $edad){
        $niño = new PNinno;
            $niño->paciente_id = $id;
            $niño->relacionPesoEstatura = $request->relacionPesoEstatura;
            if($edad <=5){
                $niño->prioridad = $request->relacionPesoEstatura + 3;
            }
            if($edad>=6 && $edad <=12){
                $niño->prioridad = $request->relacionPesoEstatura + 2;
            }
            if($edad>=13 && $edad<=15){
                $niño->prioridad = $request->relacionPesoEstatura + 1;
            }

            $niño->riesgo = ($edad * $niño->prioridad) / 100;
            $niño->save();
    }

    public function joven($request,$id, $edad){
        $joven = new PJoven;
        $joven->paciente_id = $id;
        $joven->fumador = $request->fumador;
        $joven->tiempo_fumador = $request->tiempo_fumador || null;

        if($joven->fumador == 1){
            $joven->prioridad = $joven->tiempo_fumador/4 +2;
        }
        if($joven->fumador == 0){
            $joven->prioridad = 2;
        }
        $joven->riesgo = ($edad * $joven->prioridad) / 100;
        $joven->save();
    }
    
    public function anciano($request,$id, $edad){
        $anciano = new PAnciano;
        $anciano->paciente_id = $id;
        $anciano->tieneDieta = $request->tieneDieta;

        if($edad>=60 && $edad<=100){
            $anciano->prioridad = ($edad /20 ) + 4;
        }else{
            $anciano->prioridad = ($edad / 30) + 3;
        }
        $anciano->riesgo = ($edad * $anciano->prioridad)/100 +5.3;
        $anciano->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */

    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    public function listMenores(){
       $menores = PNinno::all();
       return view('paciente.lists.pmenor', compact('menores'));
    }

    public function listJovenes(){
        $jovenes = PJoven::all();
        return view('paciente.lists.pjoven', compact('jovenes'));
    }

    public function listAncianos(){
        $ancianos = PAnciano::all();
        return view('paciente.lists.panciano', compact('ancianos'));
    }

    public function mayorRiesgo(){
        $menores = PNinno::all();
        $jovenes = PJoven::all();
        $ancianos = PAnciano::all();

        $riesgo = $menores->concat($jovenes)->concat($ancianos);
        $riesgo = $riesgo->sortByDesc('riesgo');

        return view('paciente.lists.priesgo', compact('riesgo'));
    }

    public function fumadores(){
        $fumadores = PJoven::where('fumador','=', '1')
                    ->orderBy('prioridad', 'DESC')
                    ->get();

        return view('paciente.lists.fumador', compact('fumadores'));
    }

    public function masAnciano(){
        $mayores = Paciente::orderBy('edad', 'DESC')->first();


        return view('paciente.lists.masanciano', compact('mayores'));
    }
}
