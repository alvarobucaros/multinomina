@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Licencia</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('licencias/licencias.update', $licencias->id)}}" method="post">
                @csrf
                @include('licencias.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>