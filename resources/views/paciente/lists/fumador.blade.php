@extends('paciente.list')

@section('pacientes')

<table class="table">
    <thead>
      <tr>
        <th scope="col">N° HC</th>
        <th scope="col">Nombre</th>
        <th scope="col">Edad</th>
        <th scope="col">Prioridad</th>
        <th scope="col">Riesgo</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($fumadores as $fumador)
        <tr>
        <th scope="row">{{$fumador->paciente->id}}</th>
          <td>{{$fumador->paciente->nombre}}</td>
          <td>{{$fumador->paciente->edad}}</td>
          <td>{{$fumador->prioridad}}</td>
          <td>{{$fumador->riesgo}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endsection