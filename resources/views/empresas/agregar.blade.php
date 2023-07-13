@extends('layouts/plantilla')

@section('tituloPagina', 'Nuestra Empresa')

@section('contenido')

<div class="card row mt-1">
    <h5 class="card-header">Adiciona Agrupación</h5>
    <div class="card-body ">
        <p class="card-text">

            <form method="POST" action="{{ route('empresas/empresas.store') }}">
                @csrf
                 @include('empresas.form') ;
                @include('empresas.formAdmin');
            </form>
        </p>
    </div>
</div>
    
@endsection