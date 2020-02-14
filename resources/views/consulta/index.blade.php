@extends('layouts.plantilla')

@section('content')
@include('layouts.info')

<div class="card m-4">
  <div class="card-body">
    <h5 class="card-title">Modulo de Consultas</h5>
    <p class="card-text">Este modulo es gestionado por los especialista. Ellos podran atender a sus pacientes y realizar consultas necesarias.</p>
  <a type="button" href="{{route('consultas.create')}}"class="btn btn-success text-white">Ingresar una nueva consulta</a>
  </div>    
</div>

  <div class="row m-4">
    @foreach ($consultas as $consulta)
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$consulta->tipoConsulta}}</h5>
        <p class="card-text">Especialista encargado: <strong>{{$consulta->nombreEspecialista}}</strong></p>
        <a href="/consultas/{{ strtolower($consulta->tipoConsulta)}}" class="btn btn-primary">Ver Pacientes</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

@endsection