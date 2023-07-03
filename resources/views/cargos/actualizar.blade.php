@extends('layouts/plantilla')

@section('tituloPagina', 'CARGOS EN LA PLANTA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza cargos</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('cargos/cargos.update', $cargos->id)}}" method="post">
                @csrf
                @include('cargos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>