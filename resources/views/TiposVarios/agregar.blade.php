@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Tipo Tercero</h5>
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