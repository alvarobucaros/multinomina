@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza tercero</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('terceros/terceros.update', $terceros->id)}}" method="post">
                @csrf
                @include('terceros.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>