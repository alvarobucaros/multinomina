@extends('layouts/plantilla')

@section('tituloPagina', 'NOVEDADES DE NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Novedades</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('novedades/novedades.update', $novedades->id)}}" method="post">
                @csrf
                @include('novedades.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>