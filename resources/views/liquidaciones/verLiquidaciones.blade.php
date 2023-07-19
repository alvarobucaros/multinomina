@extends('layouts/plantilla')

@section('tituloPagina', 'TIPOS VARIOS PARA LA NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Liquidacion</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="" method="post">
                @csrf
                @include('liquidaciones.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>