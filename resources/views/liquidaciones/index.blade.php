@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="card">
            <div class="card-body">       
                <span class="miTituloForm"> LIQUIDACIONES DE NOMINA</span>

                <p class="card-text">
                    
                    <form action="{{ route('liquidaciones/liquidaciones.liquidar')}}" method="post">
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
                                <label for="liq_fechaRetiro" class="col-md-2 control-label">Fecha Retiro:</label>
                                <input type="date" name="liq_fechaRetiro" id="liq_fechaRetiro" class="form_control col-md-2" 
                                maxlength="10" required >
                            </div>  
                        </div> 

                        <div class="car row mt-2"  id='liq'  style="visibility:hidden;">
                            <div class="input mb-1">
                                <input id="nom_liq" name = "nom_liq" class="miTituloForm" readonly/>                                
                            </div>  
                            @if(!empty($parametros))
                                @foreach ($parametros as $parametro)  
                                <div class="input mb-1">
                                    <label for="par_periodo" class="col-md-1 control-label">Período :</label>
                                    <input type="text" name="par_periodo" id="par_periodo" 
                                    value="{{$parametro->par_periodo}}" class="form_control col-md-1 " readonly>
                                </div>
                                @endforeach
                            @endif 
                    
                            <div class="input mb-1">
                                <label for="par_fechaDesde" class="col-md-1 control-label">Desde :</label>
                                <input type="date" name="par_fechaDesde" id="par_fechaDesde" 
                                class="form_control col-md-2"  readonly >
                                <label for="par_fechaHasta" class="col-md-1 control-label derecha">Hasta :</label>
                                <input type="date" name="par_fechaHasta" id="par_fechaHasta" 
                                class="form_control col-md-2"  readonly >
                            </div>  
                            <hr>
                            <div class="input mb-1">
                                <label for="verliq" class="col-md-3 control-label">Desea ver las liquidaciones anteriores :</label>
                                    <input type="radio" name="verliq" id="verliqS"
                                    value="S">   SI
                                    <input type="radio" name="verliq" id="verliqN" 
                                    value="N" checked> NO                        
                            </div>
                            <br>
                        </div> 

                        <div class="mb-3">
                            <div>
                                <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Menú</a>
                            </div>
                            
                            <div id="mostar" style="visibility:hidden;">
                                <button type="submit" class="btn btn-sm btn-primary" >
                                <span class="fa-solid fa-trash-can"></span> Continuar </button>
                            </div>      
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
  
$('#tt_codigo').on('change',function(){
    var selectBox = document.getElementById('tt_codigo');
    var nombre = selectBox.options[selectBox.selectedIndex].text;   
    var id = selectBox.options[selectBox.selectedIndex].value;
    var periodo =  document.getElementById('par_periodo').value;
    var dia = 30;
    var mes = periodo.substring(4, 6);
    var desde = periodo.substring(0, 4)+'-01-01';
    var hasta = periodo.substring(0, 4)+'-'+mes+'-'+dia; 
   
    var span = document.getElementById('nom_liq');
    if ('textContent' in span) {
        span.textContent = nombre;
    } else {
        span.innerText = nombre;
    }

  

    if (id != ''){
        document.getElementById('mostar').style.visibility = 'visible';
        document.getElementById('ppal').style.visibility = 'hidden';
        document.getElementById('liq').style.visibility = 'hidden';
        if (id != 'LD'){
            $("#liq_fechaRetiro").val(desde);
            $("#liq_idEmpleado").val('0');
        }
        switch (id) {
            case "LD":
                document.getElementById('ppal').style.visibility = 'visible';
                break;
            case "PS":
                document.getElementById('liq').style.visibility = 'visible';
                hasta = periodo.substring(0, 4)+'-06-30';
                break;
            case "PN":
                hasta = periodo.substring(0, 4)+'-12-30';
                document.getElementById('liq').style.visibility = 'visible';
                break;
            case "PC":
                hasta = periodo.substring(0, 4)+'-12-30';
                document.getElementById('liq').style.visibility = 'visible';
                break;

            default:
            document.getElementById('liq').style.visibility = 'visible';
                break;
            }
    }
    $("#nom_liq").val(nombre);
    $("#par_fechaDesde").val(desde);
    $("#par_fechaHasta").val(hasta);
   
}) 

function myFunction(){
    alert ('ok');
}
              
</script> 
@endsection