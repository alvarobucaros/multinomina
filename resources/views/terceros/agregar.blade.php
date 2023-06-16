@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Tercero</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('terceros/terceros.store')}}" method="post">
                @csrf
                @include('terceros.form')
            </form>
        </p>
    </div>
</div>
    
@endsection