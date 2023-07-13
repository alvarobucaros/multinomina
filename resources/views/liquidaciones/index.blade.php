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
                <span class="miTituloForm"> LIQUIDACIONES DE NOMINA</span>

                <p class="card-text">
                    <form action="{{ route('liquidaciones/liquidaciones.edit')}}" method="post">
                        @csrf                
                        <div class="card-text">  
                            <div class="input">
                                <label for="tt_codigo" class="col-md-2 control-label">Tipo liquidación :</label>
                                <select name="tt_codigo" id="tt_codigo" class="form_control">
                                    <option value="">Seleccione liquidación</option>
                                    @if(!empty($tipos))
                                        @foreach ($tipos as $tipo)                               
                                            <option value="{{$tipo->tt_codigo}}">
                                            {{$tipo->tt_descripcion}}  </option>
                                        @endforeach
                                    @endif 
                                </select>
                            </div>          
                        </div>

                        <div class="car row mt-2"  id='ppal'  style="visibility:hidden;">
                            <div class="input mb-tt_codigo1">
                                <label for="liq_idEmpleado" class="col-md-2 control-label">Empleado :</label>
                                <select name="liq_idEmpleado" id="liq_idEmpleado" class="col-md-3 form_control">
                                    <option value="0">Seleccione empleado</option>
                                    @if(!empty($empleados))
                                        @foreach ($empleados as $empleado)                               
                                            <option value="{{$empleado->id}}">
                                                {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                                                {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
                                        @endforeach
                                    @endif 
                                </select>
                            </div>
                    
                            <div class="input mb-1">
                                <label for="liq_fechaDesde" class="col-md-2 control-label">Fecha Retiro:</label>
                                <input type="date" name="liq_fechaDesde" id="liq_fechaDesde" class="form_control col-md-2" 
                                maxlength="10" required >
                            </div>
  
                        </div> 
                        <div class="mb-3">
                            <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Menú</a>
                            <button type="submit" class="btn btn-sm btn-primary" id='boton'
                            style="visibility:hidden;"> Liquidar</button>
                        </div>
                    </form>
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
    $('#tt_codigo').on('change',function(){
    var selectBox = document.getElementById('tt_codigo');
    var nombre = selectBox.options[selectBox.selectedIndex].text;   
    var id = selectBox.options[selectBox.selectedIndex].value;
    
    if (id != ''){
        document.getElementById('boton').style.visibility = 'visible';
        if (id == 'LD'){
            document.getElementById('ppal').style.visibility = 'visible';
        }else{
            document.getElementById('ppal').style.visibility = 'hidden';
        }
    }
   
}) 
              
</script> 
@endsection