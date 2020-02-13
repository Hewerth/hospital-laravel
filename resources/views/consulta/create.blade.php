@extends('layouts.plantilla')

@section('content')
    <div class="card m-4 col-9">
        <div class="card-header">
            <h5> Registrar una nueva consulta</h5>
        </div>
        <div class="card-body">
            @include('layouts.validate')
            <form action="/consultas" class="form-group" method="post" onsubmit="return validarForm()">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombreEspecialista">Nombre del especialista: </label>
                    <input type="text" class="form-control" name="nombreEspecialista" id="nombreEspecialista" placeholder="Ingrese el nombre del especialista">
                </div>
                <div class="form-group">
                    <label for="tipoConsulta">Tipo de Consulta</label>
                    <select name="tipoConsulta"  id="tipoConsulta" class="form-control">
                        <option value="" selected="true" disabled="disabled">Eliga un Tipo</option>
                        <option value="PEDIATRIA">Pediatria</option>
                        <option value="URGENCIA">Urgencia</option>
                        <option value="CGI">Consulta General Integral</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Consulta</button>
            </form>
        </div>
    </div>
    <script>
        function validarForm(){
            var nombreEspecialista = document.getElementById('nombreEspecialista').value;
            var tipoConsulta = document.getElementById('tipoConsulta').value;

            if(nombreEspecialista == null || nombreEspecialista.length == 0){
                alert('Error: El campo nombre del especialista no debe estar vacío.');
                return false;
            }
            if(tipoConsulta == null || tipoConsulta.length == 0){
                alert('Error: Debe seleccionar el tipo de consulta.');
                return false;
            }

            return confirm('Esta seguro que los datos estan correctos?');
        }
    </script>
@endsection