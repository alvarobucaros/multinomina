@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Embargo</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('embargos/embargos.store')}}" method="post">
                @csrf
                @include('embargos.form')
            </form>
        </p>
    </div>
</div>
    
@endsection