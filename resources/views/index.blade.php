@extends('layouts.plantilla')

@section('content')
<div class="jumbotron m-4">
    <h1 class="display-4">Bienvenido al sistema de atencion!</h1>
    <p class="lead">Este sistema tiene la finalidad de mejorar la calidad de atencion para nuestros pacientes.</p>
    <hr class="my-4">
    <p>Selecciona el modulo que deseas utilizar.</p>
    <a class="btn btn-primary btn-lg" href="/pacientes" role="button">Pacientes</a>
    <a class="btn btn-secondary btn-lg" href="/consultas" role="button">Consulta</a>
  </div>
@endsection