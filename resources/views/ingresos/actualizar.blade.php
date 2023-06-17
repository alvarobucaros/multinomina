@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Ingreso</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('ingresos/ingresos.update', $ingresos->id)}}" method="post">
                @csrf
                @include('ingresos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>