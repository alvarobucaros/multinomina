
@extends('layouts/plantilla')

@section('tituloPagina', 'INGRESO DE EMPLEADOS')

@section('contenido')

<div class="card row mt-2">
    <div class="card-body">
        <div class="card-text">  
            @foreach ($datos as $ingresos)         
            <form action="{{ route('ingresos/ingresos.update', $ingresos->id)}}" method="post">
                @csrf
                 @include('ingresos.ver') 
            </form>
            @endforeach
        </div>
    </div>
</div>
    
@endsection







{{-- @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
<td class="mithcmd">
    <form action="{{ route('ingresos/ingresos.edit',$item->id)}}" method="GET">
        <button class="btn btn-sm btn-primary">
        <span class="fa-solid fa-pen"></span> Edita
        </button>         
    </form>
</td>
<td class="mithcmd">
    <form action="{{ route('ingresos/ingresos.show',$item->id.'|'.$item->ter_nombre.
        '|'.$item->empl_primerApellido.'|'.$item->empl_otroApellido .'|'.$item->empl_primerNombre.'|'.$item->empl_otroNombre)}}" method="GET">
        <button class="btn btn-sm btn-danger">
        <span class="fa-solid fa-trash-can"></span> Eliminar</button>
        </button>          
    </form>      
</td>
@endif --}}