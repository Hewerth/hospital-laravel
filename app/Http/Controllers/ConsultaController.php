<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\PNinno;
use App\PAnciano;
use App\PJoven;
use App\Paciente;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();

        $menores = PNinno::all();
        $jovenes =  PJoven::all();
        $ancianos = PAnciano::all();
        $pacientes = $menores->concat($jovenes)->concat($ancianos);
        $pacientes = $pacientes->sortByDesc('prioridad');

        return view('consulta.index', compact('consultas','pacientes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('consulta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consulta = new Consulta;
        $consulta->nombreEspecialista = $request->nombreEspecialista;
        $consulta->tipoConsulta = $request->tipoConsulta;
        $consulta->cantPacientes = $request->cantPacientes || 0;

        $consulta->save();

        return redirect()->route('consultas.index')->with('info', 'Consulta ingresada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        return view('consulta.atender');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        //
    }

    public function pediatria(){
        $menores = PNinno::where('prioridad','<=','4')->get();
        
        return view('consulta.lists.pediatria',compact('menores'));
    }

    public function urgencia(){
        
        $menores = PNinno::where('prioridad','>=','4')->get();
        $jovenes =  PJoven::where('prioridad','>=','4')->get();
        $ancianos = PAnciano::where('prioridad','>=','4')->get();
        $urgencia = $menores->concat($jovenes)->concat($ancianos);
        $urgencia = $urgencia->sortByDesc('prioridad');
        
        return view('consulta.lists.urgencia', compact('urgencia'));
    }

    
    public function cgi(){
        $jovenes = PJoven::all();
        $ancianos = PAnciano::all();
        $cgi = $jovenes->concat($ancianos);
        $cgi = $cgi->sortByDesc('prioridad');

        return view('consulta.lists.cgi', compact('cgi'));
    }

}
