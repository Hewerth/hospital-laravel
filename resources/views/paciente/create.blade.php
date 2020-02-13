@extends('layouts.plantilla')
@section('content')
   <div class="card m-4 col-9">
       <div class="card-header">
         <h5>Ingresar Paciente</h5>
       </div>
       <div class="card-body">
           @include('layouts.validate')
           <form action="/pacientes" method="post" class="form-group" onsubmit="return validarFormulario()">
            {{ csrf_field() }}
               <div class="form-group">
                   <label for="nombre">Nombre:</label>
                   <input type="text"
                        class="form-control" 
                        name="nombre" 
                        id="nombre"
                        placeholder="Ingrese nombre del paciente">
               </div>
               <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number"
                     class="form-control" 
                     name="edad" 
                     id="edad"
                     placeholder="Ingrese edad del paciente">
                </div>
                
                    <div class="form-group">
                        <label for="relacionPesoEstatura">Relacion Peso-estatura:</label>
                        <input type="number"
                             class="form-control" 
                             name="relacionPesoEstatura" 
                             id="relacionPesoEstatura"
                             min="1"
                             max="4"
                             placeholder="Ingrese relacion de peso-estatura del 1 al 4">
                        </div>
                        
                        <div class="form-group">
                            <label for="fumador">Es fumador:</label>
                            <select name="fumador" id="fumador" class="form-control">
                              <option value="" selected="true" disabled="disabled">Eliga una opcion</option>
                              <option value="0">No fuma</option>
                              <option value="1">Si fuma</option>
                         </select>
                        </div>
                        <div class="form-group">
                            <label for="tiempo_fumador">Años fumando:</label>
                            <input type="number"
                                 class="form-control" 
                                 name="tiempo_fumador" 
                                 id="tiempo_fumador"
                                 min="0"
                                 placeholder="Años que ha fumado">
                            </div>
                        
                            <div class="form-group">
                                <label for="tieneDieta">Tiene dieta:</label>
                                   <select name="tieneDieta" id="tieneDieta" class="form-control">
                                        <option value="" selected="true" disabled="disabled">Eliga una opcion</option>
                                        <option value="0">No esta a dieta</option>
                                        <option value="1">Si esta a dieta</option>
                                   </select>
                                </div>
                                <p>**Nota: si el paciente es un menor debe registrar su relacion peso estatura.
                                    Si es joven, registre si es fumador o no. Si es adulto mayor, si lleva una dieta. 
                                </p>
                <button type="submit" class="btn btn-primary">Ingresar Paciente</button>
           </form>
       </div>
   </div>
<script>
        function validarFormulario(){
        var nombre = document.getElementById('nombre').value;
        var edad = document.getElementById('edad').value;
        var relacionPesoEstatura = document.getElementById('relacionPesoEstatura').value;
        var fumador = document.getElementById('fumador').value;
        var tiempo_fumador = document.getElementById('tiempo_fumador').value;
        var tieneDieta = document.getElementById('tieneDieta').value;

        if(nombre == null || nombre.length == 0 ){
        alert('ERROR: El campo nombre no debe ir vacío');
        return false;
        }

        if(edad == null || edad.length == 0){
            alert('ERROR: El campo edad no puede estar vacío.');
            return false;
        }

        if(edad <=15 && relacionPesoEstatura == null || edad <=15 && relacionPesoEstatura.length == 0){
            alert('ERROR: El campo relacion peso-estatura no puede estar vacío.');
            return false;
        }
       
        if(edad >=16 && edad <=40 && fumador == null || edad >=16 && edad <=40 && fumador.length == 0 ){
            alert('ERROR: Debe seleccionar una opcion en el campo fumador.');
            return false;
        }
        console.log(fumador)

        if(edad >= 16 && edad <=40 && fumador == 1 && tiempo_fumador == null){
            alert('ERROR: Debe indicar los años que ha fumando.');
            return false;
        }

        if(edad >=41 && tieneDieta == null || edad >=41 && tieneDieta.length == 0){
            alert('ERROR: Debe seleccionar una opcion en el campo dieta.');
            return false;
        }
        return confirm(`Los Datos del paciente son correctos?: Nombre: ${nombre}, Edad: ${edad}`);
    }
</script>
@endsection