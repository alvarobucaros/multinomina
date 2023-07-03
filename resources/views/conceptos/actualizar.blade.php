@extends('layouts/plantilla')

@section('tituloPagina', 'CONCEPTOS DE NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Conceptos</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('conceptos/conceptos.update', $conceptos->id)}}" method="post">
                @csrf
                @include('conceptos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>