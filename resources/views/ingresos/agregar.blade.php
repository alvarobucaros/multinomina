@extends('layouts/plantilla')

@section('tituloPagina', 'INGRESOS A NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Ingreso</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('ingresos/ingresos.store')}}" method="post">
                @csrf
                @include('ingresos.form')
            </form>
        </p>
    </div>
</div>
    
@endsection