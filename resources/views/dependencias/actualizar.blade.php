@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Dependencias</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('dependencias/dependencias.update', $dependencias->id)}}" method="post">
                @csrf
                @include('dependencias.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>