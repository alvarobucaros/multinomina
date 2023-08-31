@extends('layouts/plantilla')

@section('tituloPagina', 'INGRESOS A NOMINA')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza un Ingreso</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('ingresos/ingresos.update', $ingresos->id)}}" method="post">
                @csrf
                @include('ingresos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="{!! url('js/app/coopfondos.js') !!}" type='text/javascript'></script>
@endsection