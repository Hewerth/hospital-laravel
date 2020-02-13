@extends('layouts.plantilla')
@section('content')
<div class="row m-4">
  <a type="button" href="/pacientes" class="btn btn-secondary">Volver</a> 
</div>
  <div class="card m-4">
    
    @yield('pacientes')
  </div>
@endsection