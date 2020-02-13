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
        @foreach ($jovenes as $joven)
        <tr>
        <th scope="row">{{$joven->paciente->id}}</th>
          <td>{{$joven->paciente->nombre}}</td>
          <td>{{$joven->paciente->edad}}</td>
          <td>{{$joven->prioridad}}</td>
          <td>{{$joven->riesgo}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endsection