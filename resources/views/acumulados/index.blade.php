@extends('layouts/plantilla')

@section('tituloPagina')
    <p class="mayuscula izquierda">Acumulados de nómina </p>
@endsection

@section('contenido')

<div class="card row mt-2">
  
    <div class="card-body  mb-6">
        <div class="card-text">          
            <form action="{{ route('acumulados/acumulados.list',$datos[0])}}" method="post">
                @csrf
                <div class="input mb-1">
                    <label for="acu_periodo" class="col-md-1 control-label">Periodo :</label>
                    <input type="text" name="acu_periodo" id="acu_periodo" class="form_control col-md-1"
                    required value="{{$datos[0]}}">
                </div>
                <div class="input mb-1">
                    <label class="col-md-1 control-label" name='selConcepto'>Empleado :</label>
                    <select name="acu_idEmpleado" id="acu_idEmpleado"  class="form_control col-md-4">
                        <option value="0">Seleccione un empleado</option>
                        @if(!empty($empleados))
                        @foreach ($empleados as $empleado)                               
                            <option value="{{$empleado->id}}" >
                                {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                                {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
                        @endforeach
                        @endif 
                        
                    </select>
                </div> 
                <br>
                <div class="miButton2">
                    <a href="{{route('acumulados')}}" class="btn btn-sm btn-info"> Menú</a>
                    <form action="{{ route('terceros/terceros.edit',$datos[0])}}" method="GET">
                        <button class="btn btn-sm btn-primary">
                        <span class="fa-solid fa-pen"></span> Listado
                        </button>         
                    </form>                   
                
                    <form action="{{ route('acumulados/acumulados.comprobantes',$datos[0])}}" method="GET">
                        <button class="btn btn-sm btn-warning">
                        <span class="fa-solid fa-trash-can"></span> Comprobantes</button>
                        </button>         
                    </form>      
                   
                </div>    
            </form> 
        </div>
    </div>
</div>

{{-- https://www.positronx.io/laravel-pdf-tutorial-generate-pdf-with-dompdf-in-laravel/
https://www.srcodigofuente.es/aprender-php/guia-dompdf-completa --}}
    
@endsection