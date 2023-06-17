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
                <th>Nombre</th>            
            </thead>
            <tbody>  
                <tr>
                    <td>{{ $ingresos->dep_nombe}}</td>                                
                </tr>
            </tbody>
        </table>
        <hr>

        <form action="{{ route('ingresos/ingresos.destroy', $ingresos->id) }}" method="POST">
            @csrf
            @method('DELETE')
              <a href="{{route('ingresos')}} " class="btn btn-sm btn-info"> 
                <span class="fa-solid fa-hand-point-left"></span> Regresa</a>
            <button class="btn btn-sm btn-primary">
                <span class="fa-solid fa-thumbs-up"></span> Acepta</button> 
        </form>
      </p>  
    </div>
  </div>  
@endsection