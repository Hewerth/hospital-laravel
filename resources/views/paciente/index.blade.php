@extends('layouts.plantilla')

@section('content')
@include('layouts.info')

  <div class="card m-4">
    <div class="card-body">
      <h5 class="card-title">Modulo Pacientes</h5>
      <p class="card-text">En este modulo podras ingresar pacientes y revisar las categorias para su atencion.</p>
    <a type="button" href="{{route('pacientes.create')}}"class="btn btn-success text-white">Ingresar Paciente</a>
    <a type="button" href="{{route('paciente.riesgo')}}"class="btn btn-danger text-white">Paciente en riesgo</a>
    <a type="button" href="{{route('paciente.fumador')}}"class="btn btn-warning text-white">Pacientes fumadores en prioridad alta</a>
    <a type="button" href="{{route('paciente.anciano')}}"class="btn btn-dark text-white">Paciente más anciano</a>
    </div>    
  </div>

  <div class="card m-4">
    <a type="button" href="/pacientes/menores"class="btn btn-success text-white m-2">Pacientes Niños</a>
    <a type="button" href="/pacientes/jovenes"class="btn btn-info text-white m-2">Pacientes Jovenes</a>
    <a type="button" href="/pacientes/ancianos"class="btn btn-secondary text-white m-2">Pacientes Ancianos</a>
  </div>
  
@endsection