@extends('layouts/plantilla')

@section('tituloPagina', 'LISTA DE BANCOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Banco</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('bancos/bancos.store')}}" method="post">
                @csrf
                @include('bancos.form')
            </form>
        </p>
    </div>
</div>
    
@endsection