@extends('layouts/plantilla')

@section('tituloPagina', 'NOVEDADES DE NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Novedades</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('novedades/novedades.store')}}" method="post">
                @csrf
                @include('novedades.form')
            </form>
        </p>
    </div>
</div>
    
@endsection