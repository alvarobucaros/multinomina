@extends('layouts/plantilla')

@section('tituloPagina', 'COOPERATIVAS Y FONDOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Cooperativas Fondos</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('coopfondos/coopfondos.update', $coopfondos->id)}}" method="post">
                @csrf
                @include('coopfondos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')
    <script src="{!! url('js/app/coopfondos.js') !!}" type='text/javascript'></script>
@endsection