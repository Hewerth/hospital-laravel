@extends('paciente.list')

@section('pacientes')

<table class="table">
    <thead>
      <tr>
        <th scope="col">N° HC</th>
        <th scope="col">Nombre</th>
        <th scope="col">Edad</th>
        <th scope="col">Riesgo</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($riesgo as $paciente)
        <tr>
        <th scope="row">{{$paciente->paciente->id}}</th>
          <td>{{$paciente->paciente->nombre}}</td>
          <td>{{$paciente->paciente->edad}}</td>
          <td>{{$paciente->riesgo}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endsection