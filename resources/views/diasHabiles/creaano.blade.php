@extends('layouts/plantilla')

@section('tituloPagina', 'DIAS HABILES')

@section('contenido')

<div class="card row mt-2">
  
    <div class="card-body">
        <p class="card-text">
            {{-- @foreach ($datos as $dato) --}}
                <form action="{{ route('diasHabiles/diasHabiles.nuevoano',$diasHabiles->dias_fecha)}}" method="post">
                    @csrf
                    <div class="input ">
                        <label for="dias_ano" class="col-md-2 control-label">Año a crear :</label>
                        <input type="text" name="dias_ano" id="dias_ano" class="form_control col-md-2"
                        required value {{ $diasHabiles->dias_fecha }}>
                    </div>
                    <button class="btn btn-sm btn-primary">
                        <span class="fa-solid fa-pen"></span> Continua
                        </button>  
                </form>
            {{-- @endforeach --}}
        </p>
    </div>
</div>
    
@endsection