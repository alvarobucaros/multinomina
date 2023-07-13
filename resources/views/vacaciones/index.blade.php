@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @if ($mensaje = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $mensaje }}
                            </div>
                        @endif
                    </div>
                </div> 
                <span class="miTituloForm"> LIBRO DE VACACIONES</span>

                <p class="card-text">
                    <form action="{{ route('vacaciones/vacaciones.edit')}}" method="post">
                        @csrf                
                        <div class="input">
                            <label for="vac_idEmpleado" class="col-md-1 control-label">Empleado :</label>
                            <select name="vac_idEmpleado" id="vac_idEmpleado" class="form_control">
                                <option value="0">Seleccione Empleado</option>                           
                                @foreach ($empleados as $empleado)                               
                                <option value="{{$empleado->id}}" >
                                    {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                                    {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Menú</a>
                            <button type="submit" class="btn btn-sm btn-primary"> Procesar</button>
                        </div>  
                    </form>
                </p>
                <p>
                  
                </p>
            </div>

        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Estás viendo la página de inicio. Inicie sesión para ver los contenidos.</p>
        @endguest
    </div>
@endsection
@section('scripts')
<script>   
    $(document).ready(function(){
      
    });

    function getEmpleado()
  {
    // var empleadoID = document.getElementById("vac_idEmpleado").value;
    //   window.location.href = "/traeLiq/"+id+'|'+nombre;
    // https://fernando-gaitan.com.ar/laravel-parte-13-ajax/

    var selectBox = document.getElementById('vac_idEmpleado');
    var nombre = selectBox.options[selectBox.selectedIndex].text;   
    var empleadoID = selectBox.options[selectBox.selectedIndex].value;

    if (empleadoID == 0){ 
        alert('Seleccione empleado');
    }else{
        alert(nombre);
        
        window.location.href = "vacaciones/create/{}"+empleadoID+"}";
     
    }
  }              
</script> 
@endsection