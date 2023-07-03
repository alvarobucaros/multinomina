@extends('layouts/plantilla')

@section('tituloPagina')
<p class="mayuscula">{{$ar[1]}} </p>
@endsection
@section('contenido')
<div class="car row mt-2" >
    <p>                    
        <a class="btn btn-info btn-sm" href="{{ route('liquidaciones')}}">
            <i class="fa-solid fa-plus"></i> Regresar </a>
        @if (auth()->user()->profile == 'A')

        <a class="btn btn-primary btn-sm" href="{{ route('liquidaciones/liquidaciones.create',$ar[0])}}">
      
            <i class="fa-solid fa-plus"></i> Nueva Liquidación </a> 
 
        @endif        
    </p>

</div>
<p class="card-text">
    <div class="table table-resposive-sm">
        <table class="table table-sm table-bordered table-striped table-hover">
            <thead class="table-success miThead">
                <th class="centro">Número</th>
                <th class="centro">Fecha Desde</th>
                <th class="centro">Fecha Hasta</th>
                <th class="centro">Estado</th>
                @if (auth()->user()->profile != 'C') 
                    <th  class="centro">Acciones</th>
                @endif                               
            </thead>
            <tbody>
                @if(!empty($datos))
                @foreach ($datos as $item)  
                    <tr>
                        <td class="centro">{{$item->id}}</td>
                        <td class="centro">{{$item->liq_fechaDesde}}</td>
                        <td class="centro">{{$item->liq_fechaHasta}}</td>
                        <td class="centro">{{$item->liq_estado == 'P' ? 'PENDIENTE': 'CERRADA'}}</td>

                        @if ($item->liq_estado == 'P')
                            <td class="centro">
                                <form action="{{ route('liquidaciones/liquidaciones.create',$item->id)}}" method="GET">
                                    <button class="btn btn-sm btn-primary">
                                    <span class="fa-solid fa-pen"></span> Liquidar
                                    </button>         
                                </form>
                            </td>
                        @else
                        <td class="centro">
                            <form action="{{ route('liquidaciones/liquidaciones.verLiquidacion',$item->id)}}" method="GET">
                                <button class="btn btn-sm btn-secondary">
                                <span class="fa-solid fa-pen"></span> Ver Liquidación
                                </button>         
                            </form>
                        </td> 
                        @endif   
                    </tr>
                @endforeach
                @endif 
            </tbody>
        </table>
    </div>

</p> 
@endsection