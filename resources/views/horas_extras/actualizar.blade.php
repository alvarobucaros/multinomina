@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Horas extras</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('horas_extras/horas_extras.update', $HorasExtras->id)}}" method="post">
                @csrf
                @include('horas_extras.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>