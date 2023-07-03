@extends('layouts/plantilla')

@section('tituloPagina', 'RELACION DE EMPLEADOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Empleado</h5>
    <div class="card-body">
        <div class="card-text">
            <form action="{{ route('empleados/empleados.store')}}" method="post">
                @csrf
                @include('empleados.form')
             </form>
        </div>
    </div>
</div>
    
@endsection