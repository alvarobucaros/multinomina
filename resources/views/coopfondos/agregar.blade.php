@extends('layouts/plantilla')

@section('tituloPagina', 'COOPERATIVAS Y FONDOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Cooperativa Fondo</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('coopfondos/coopfondos.store')}}" method="post">
                @csrf
                @include('coopfondos.form')
            </form>
        </p>
    </div>
</div>
    
@endsection