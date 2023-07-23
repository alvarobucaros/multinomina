@extends('layouts/plantilla')

@section('tituloPagina', 'LISTA DE BANCOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza banco</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('bancos/bancos.update', $bancos->id)}}" method="post">
                @csrf
                @include('bancos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>