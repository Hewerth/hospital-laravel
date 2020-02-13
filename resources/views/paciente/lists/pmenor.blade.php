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
        @foreach ($menores as $menor)
        <tr>
        <th scope="row">{{$menor->paciente->id}}</th>
          <td>{{$menor->paciente->nombre}}</td>
          <td>{{$menor->paciente->edad}}</td>
          <td>{{$menor->prioridad}}</td>
          <td>{{$menor->riesgo}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endsection