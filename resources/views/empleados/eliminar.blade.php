@extends('layouts/plantilla')

@section('tituloPagina', 'Borra Registro')

@section('contenido')
<div class="card">
    <h5 class="card-header"> Elimina este empleado </h5>
    <div class="card-body">
   
      <p class="card-text">
        <div class="alert alert-danger" role="alert">
            Va a eliminar este registro
        </div>
        <table class="table table-sm table-hover">
            <thead>
                <th>Nombre</th>
                <th>documento</th>
                
            </thead>
            <tbody>  
                <tr>
                    <td>{{ $empleados->empl_primerNombre}} {{ $empleados->empl_otroNombre}}
                        {{ $empleados->empl_primerApellido}} {{ $empleados->empl_otroApellido}}</td>
                    <td>{{ $empleados->empl_tipodoc}} {{ $empleados->empl_nrodoc}}</td>
                </tr>
            </tbody>
        </table>
        <hr>

        <form action="{{ route('empleados/empleados.destroy', $empleados->id) }}" method="POST">
            @csrf
            @method('DELETE')
              <a href="{{route('empleados')}} " class="btn btn-sm btn-info"> 
                <span class="fa-solid fa-hand-point-left"></span> Regresa</a>
            <button class="btn btn-sm btn-primary">
                <span class="fa-solid fa-thumbs-up"></span> Acepta</button> 
        </form>
      </p>  
    </div>
  </div>  
@endsection