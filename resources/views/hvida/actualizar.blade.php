@extends('layouts/plantilla')

@section('tituloPagina', 'HOJA DE VIDA DEL EMPLEADO')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Hoja de vida</h5>
    <div class="card-body">
        <div class="card-text">  
                    
            <form action="" method="post">
                @csrf
                 @include('hvida.index') 
            </form>
        
        </div>
    </div>
</div>
    
@endsection