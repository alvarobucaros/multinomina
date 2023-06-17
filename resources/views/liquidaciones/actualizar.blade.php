@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza : {{$empresas->em_nombre}}</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('empresas/empresas.update', $empresas->id)}}" method="post">
                @csrf
                @include('empresas.form')       
            </form>
        </div>
    </div>
</div>
    
@endsection