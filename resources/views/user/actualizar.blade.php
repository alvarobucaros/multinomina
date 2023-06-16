@extends('layouts/plantilla')

@section('tituloPagina', 'Nuevo Registro')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Usuario</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('user/user.update', $user->id)}}" method="post">
                @csrf
                @include('user.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>