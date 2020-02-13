@extends('consulta.list')

@section('listaPacientes')
<table class="table">
    <thead>
      <tr>
        <th scope="col">N° HC</th>
        <th scope="col">Nombre</th>
        <th scope="col">Edad</th>
        <th scope="col">Prioridad</th>
        <th scope="col">Riesgo</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cgi as $paciente)
        <tr>
        <th scope="row"> {{$paciente->paciente->id}} </th>
          <td> {{$paciente->paciente->nombre}} </td>
          <td> {{$paciente->paciente->edad}} </td>
          <td> {{$paciente->prioridad}}</td>
          <td> {{$paciente->riesgo}} </td>
          <td>
            <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atender">
            Atender Paciente
          </button>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>

      <!-- Modal -->
<div class="modal fade" id="atender" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atender Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="form-group">
          <label for="">Atendiendo a : {{$paciente->paciente->nombre}}</label>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Cerrar Atencion</button>
      </div>
    </div>
  </div>
</div>
@endsection