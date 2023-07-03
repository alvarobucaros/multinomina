@extends('layouts/plantilla')

@section('tituloPagina', 'PARAMETROS DEL SISTEMA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Parámetros</h5>
    <div class="card-body">
        <div class="card-text">  
            @foreach ($datos as $parametros)         
            <form action="{{ route('parametros/parametros.update', $parametros->id)}}" method="post">
                @csrf
                 @include('parametros.index') 
            </form>
            @endforeach
        </div>
    </div>
</div>
    
@endsection