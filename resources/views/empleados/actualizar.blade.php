@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Empleado</h5>
    <div class="card-body">
        <div class="card-text">
          
            <form action="{{ route('empleados/empleados.update', $empleados->id)}}" method="post">
                @csrf
                @include('empleados.form')
            </form>
        </div>
    </div>
</div>
    
@endsection