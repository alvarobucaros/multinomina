@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Embargos</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('embargos/embargos.update', $embargos->id)}}" method="post">
                @csrf
                @include('embargos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>