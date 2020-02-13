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
        @foreach ($ancianos as $anciano)
        <tr>
        <th scope="row">{{$anciano->paciente->id}}</th>
          <td>{{$anciano->paciente->nombre}}</td>
          <td>{{$anciano->paciente->edad}}</td>
          <td>{{$anciano->prioridad}}</td>
          <td>{{$anciano->riesgo}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endsection