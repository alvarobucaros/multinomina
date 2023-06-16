@extends('layouts/plantilla')

@section('tituloPagina', 'Borra Registro')

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
                <th>Cooperativa o Fondo</th>           
            </thead>
            <tbody>  
                <tr>
                    <td>{{ $ar[2] }} {{ $ar[3] }} {{ $ar[4] }} {{ $ar[5] }}</td> 
                    <td>{{ $ar[1] }} </td>                             
                </tr>
            </tbody>
        </table>
        <hr>

        <form action="{{ route('coopfondos/coopfondos.destroy', $ar[0]) }}" method="POST">
            @csrf
            @method('DELETE')
              <a href="{{route('coopfondos')}} " class="btn btn-sm btn-info"> 
                <span class="fa-solid fa-hand-point-left"></span> Regresa</a>
            <button class="btn btn-sm btn-primary">
                <span class="fa-solid fa-thumbs-up"></span> Acepta</button> 
        </form>
      </p>  
    </div>
  </div>  
@endsection