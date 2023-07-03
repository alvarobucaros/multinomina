@extends('layouts/plantilla')

@section('tituloPagina', 'USUARIOS DEL SISTEMA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Adiciona Usuario</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('user/user.store')}}" method="post">
                @csrf
                @include('user.form')
            </form>
        </p>
    </div>
</div>
    
@endsection