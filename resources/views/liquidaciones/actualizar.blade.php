@extends('layouts/plantilla')

@section('tituloPagina', '')

@section('contenido')


<form action="{{ route('terceros/terceros.traeLiq',$tipos->tt_codigo)}}" method="post"></form>
    <div class="card row mt-2">
        <h5 class="card-header">Liquidaciones de Nómina</h5>
        <div class="card-body">
            <div class="card-text">  
                <div class="input mb-tt_codigo1">
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
        </div>
    </div>
    <div class="car row mt-2">
        <p>                     
            <a class="btn btn-info btn-sm" href="{{ route('home.index')}}">
                <i class="fa-solid fa-plus"></i> Menú </a>
        </p>
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
        <div class="car row mt-2">
            <p>                     
                <a class="btn btn-info btn-sm" 
                href="{{ route('liquidaciones/liquidaciones.create','LD')}}">
                    <i class="fa-solid fa-plus"></i> Nueva Liquidación </a>
            </p>
        </div>  
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
        if (id != 'LD'){
            window.location.href = "/traeLiq/"+id+'|'+nombre;
        }else{
           document.getElementById('ppal').style.visibility = 'visible'; 
        }
    }
   
})               
</script> 
@endsection