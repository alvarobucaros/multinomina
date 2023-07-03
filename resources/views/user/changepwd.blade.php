@extends('layouts/plantilla')

@section('tituloPagina', 'USUARIOS DEL SISTEMA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Cambia contraseña</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('user/user.update', $user->id)}}" method="post">
                @csrf
                @include('user.formpwd')
            </form>
        </div>
    </div>
</div>
    
@endsection

<script>
    
</script>