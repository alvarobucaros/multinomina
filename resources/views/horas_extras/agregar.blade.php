@extends('layouts/plantilla')

@section('tituloPagina', 'HORAS EXTRAS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Horas extras</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('horas_extras/horas_extras.store')}}" method="post">
                @csrf
                @include('horas_extras.form')
            </form>
        </p>
    </div>
</div>
    
@endsection