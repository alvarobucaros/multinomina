@extends('layouts/plantilla')

@section('tituloPagina', 'Importa Excel')

@section('contenido')

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header ">
            <span class="mayuscula miSubTitulo">
            Importa Cragos de empleados desde Excel a la base de datos
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('cargos/cargos.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Importar Datos </button>
                <a href="{{route('cargos')}}" class="btn btn-info"> Regresa</a>
              </form>
             
        </div>
    </div>
</div>
@endsection
