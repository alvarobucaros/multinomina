@extends('layouts/plantilla')

@section('tituloPagina', 'Exporta a Excel')

@section('contenido')

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header ">
            <span class="mayuscula miSubTitulo">
            Importa empleados desde Excel a la base de datos
            </span>
        </div>
        <div class="card-body">
            <form action="{{ route('empleados/empleados.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Importar Datos </button>
                <a href="{{route('empleados')}}" class="btn btn-info"> Regresa</a>
              </form>
             
        </div>
    </div>
</div>
@endsection
