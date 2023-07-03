@extends('layouts/plantilla')

@section('tituloPagina', 'DEPENDENCIAS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Dependencia</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('dependencias/dependencias.store')}}" method="post">
                @csrf
                @include('dependencias.form')
            </form>
        </p>
    </div>
</div>
    
@endsection