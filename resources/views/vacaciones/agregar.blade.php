@extends('layouts/plantilla')

@section('tituloPagina', 'vacaciones A EMPLEADOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona vacaciones</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('vacaciones/vacaciones.store')}}" method="post">
                @csrf
                @include('vacaciones.form')
            </form>
        </p>
    </div>
</div>
    
@endsection