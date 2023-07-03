@extends('layouts/plantilla')

@section('tituloPagina', 'DIAS HABILES')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona día</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('diasHabiles/diasHabiles.store')}}" method="post">
                @csrf
                @include('diasHabiles.form')
            </form>
        </p>
    </div>
</div>
    
@endsection