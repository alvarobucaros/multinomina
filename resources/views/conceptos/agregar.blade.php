@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Concepto</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('conceptos/conceptos.store')}}" method="post">
                @csrf
                @include('conceptos.form')
            </form>
        </p>
    </div>
</div>
    
@endsection