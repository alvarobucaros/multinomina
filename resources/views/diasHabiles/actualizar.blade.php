@extends('layouts/plantilla')

@section('tituloPagina', 'DIAS HABILES')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Día</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('diasHabiles/diasHabiles.update', $diasHabiles->id)}}" method="post">
                @csrf
                @include('diasHabiles.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>