@extends('layouts/plantilla')

@section('tituloPagina', 'LICENCIAS A EMPLEADOS')

@section('contenido')
<div class="card">
    <h5 class="card-header"> Elimina este registro </h5>
    <div class="card-body">
   
      <p class="card-text">
        <div class="alert alert-danger" role="alert">
            Va a eliminar este registro
        </div>
        <table class="table table-sm table-hover">
            <thead>
                <th>Empleado</th>
                <th>Tipo</th>               
            </thead>
            <tbody>  
                <tr>
                  <td>{{ $ar[2] }} {{ $ar[3] }} {{ $ar[4] }} {{ $ar[5] }}</td> 
                      
                  <td>
                    @switch($ar[1])
                    @case('MT')
                        <span>Maternidad, lactancia y aborto</span>
                        @break                                    
                    @case('PT')
                        <span>Paternidad</span>
                        @break
                    @case('CO')
                        <span>Desempeño de cargo oficial</span>
                        @break                                    
                    @case('CD')
                        <span>Calamidad Doméstica</span>
                        @break 
                    @case('LU')
                        <span>Licencia de Luto</span>
                        @break                                    
                    @case('ES')
                        <span>Licenia de Estudio</span>
                        @break                                     
                    @default
                        <span>Licencia NO remunerada</span>
                @endswitch
            </td>
     
                 
                </tr>
            </tbody>
        </table>
        <hr>

        <form action="{{ route('licencias/licencias.destroy', $ar[0]) }}" method="POST">
            @csrf
            @method('DELETE')
              <a href="{{route('licencias')}} " class="btn btn-sm btn-info"> 
                <span class="fa-solid fa-hand-point-left"></span> Regresa</a>
            <button class="btn btn-sm btn-primary">
                <span class="fa-solid fa-thumbs-up"></span> Acepta</button> 
        </form>
      </p>  
    </div>
  </div>  
@endsection