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
                <th>Código</th>
                <th>Descripción</th>               
            </thead>
            <tbody>  
                <tr>
                    <td>{{ $tiposvarios->tt_codigo}}</td>
                    <td>{{ $tiposvarios->tt_descripcion}}</td>                    
                </tr>
            </tbody>
        </table>
        <hr>

        <form action="{{ route('tiposvarios/tiposvarios.destroy', $tiposvarios->id) }}" method="POST">
            @csrf
            @method('DELETE')
              <a href="{{route('tiposvarios')}} " class="btn btn-sm btn-info"> 
                <span class="fa-solid fa-hand-point-left"></span> Regresa</a>
            <button class="btn btn-sm btn-primary">
                <span class="fa-solid fa-thumbs-up"></span> Acepta</button> 
        </form>
      </p>  
    </div>
  </div>  
@endsection