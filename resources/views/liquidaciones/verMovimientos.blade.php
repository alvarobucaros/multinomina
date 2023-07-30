@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @if ($mensaje = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $mensaje }}
                            </div>
                        @endif
                    </div>
                </div>                
                <p>
                    <a class="btn btn-info btn-sm" href="{{ route('liquidaciones')}}">
                        <i class="fa-solid fa-file-excel"></i> Menú </a>
                    @if (auth()->user()->profile == 'A') 
                        <a class="btn btn-success btn-sm" href="{{ route('liquidaciones/liquidaciones.export')}}">
                        <i class="fa-solid fa-file-excel"></i> A Excel</a>
                    @endif
                    <span class="miTituloForm"> MOVIMIENTO LIQUIDACION</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Periodo</th>
                                <th>Empleado</th>
                                <th>Concepto</th>
                                <th>Cantidad</th>
                                <th>Valor</th>
                                <th>Estado</th>
                                  
                            </thead>
                          <hr>
@php
    $idEmpleado=0;
@endphp

                            <tbody>
                                @foreach ($datos as $item) 
                 
                                     @php
                                        if ($idEmpleado <> $item->acu_idEmpleado){
                                            if ($idEmpleado > 0){
                                                echo('<tr></tr>');
                                            }
                                            $idEmpleado = $item->acu_idEmpleado;                                       
                                        }
                                    @endphp 
                                    <tr>
                                        <td>{{$item->acu_periodo}}</td>
                                        <td>{{$item->empl_primerApellido}} {{$item->empl_otroApellido}}
                                            {{$item->empl_primerNombre}} {{$item->empl_otroNombre}}</td>
                                        <td>{{$item->cp_descripcion}}</td>
                                        <td>{{$item->acu_numero}}</td>
                                        <td class="derecha"> @php echo number_format($item->acu_valor,2,",",".");
                                            
                                        @endphp </td>
                                        <td class="mithcmd miColc">{{($item->acu_estado = 'A') ? 'Activo':'Cerrado'}}</td>

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->acu_idEmpresa}}
                                        </td>                          
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $datos->links()}}
                            </div>
                        </div>
                    </div>
                </p>
            </div>

        </div>
        @endauth
  

        @guest
        <h1>Homepage</h1>
        <p class="lead">Estás viendo la página de inicio. Inicie sesión para ver los contenidos.</p>
        @endguest
    </div>
@endsection