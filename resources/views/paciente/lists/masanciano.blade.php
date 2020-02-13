@extends('paciente.list')

@section('pacientes')
    <div class="card-body">
        <ul>
            <ol>Numero de Historia Clinica : {{$mayores->id}}</ol>
            <ol>Nombre del Paciente : {{$mayores->nombre}}</ol>
            <ol>Edad del Paciente : {{$mayores->edad}}</ol>
        </ul>
    
    </div>
     
@endsection