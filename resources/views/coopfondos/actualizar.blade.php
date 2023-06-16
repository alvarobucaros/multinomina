@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Cooperativas Fondos</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('coopfondos/coopfondos.update', $coopfondos->id)}}" method="post">
                @csrf
                @include('coopfondos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>