@extends('layouts/plantilla')

@section('tituloPagina', 'TIPOS VARIOS PARA LA NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Tipos Varios</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('tiposvarios/tiposvarios.update', $tiposvarios->id)}}" method="post">
                @csrf
                @include('TiposVarios.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>