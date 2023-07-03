@extends('layouts/plantilla')

@section('tituloPagina', 'LICENCIAS A EMPLEADOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Licencia</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('licencias/licencias.store')}}" method="post">
                @csrf
                @include('licencias.form')
            </form>
        </p>
    </div>
</div>
    
@endsection