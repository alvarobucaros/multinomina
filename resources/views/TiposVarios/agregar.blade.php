@extends('layouts/plantilla')

@section('tituloPagina', 'TIPOS VARIOS PARA LA NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Tipos varios</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('tiposvarios/tiposvarios.store')}}" method="post">
                @csrf
                @include('TiposVarios.form')
            </form>
        </p>
    </div>
</div>
    
@endsection