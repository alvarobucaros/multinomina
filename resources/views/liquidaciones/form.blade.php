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
                    @foreach ($empleados as $empleado) 
                        <span class="miMayuscula">LIQUIDACION : </span>  
                        {{-- <span class="miMayuscula">{{$tiposVarios->tt_descripcion}} </span> --}}                              
                    @endforeach 
                    <br>
                    <div>
                        <a class="btn btn-info btn-sm" href="{{ route('liquidaciones')}}">
                            <i class="fa-solid fa-plus"></i> Menú </a>   
                        <a class="btn btn-warning btn-sm" href="{{ route('liquidaciones')}}">
                            <i class="fa-solid fa-plus"></i> Liquidar  </a> 
                    </div>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">                            
                                <th>Fch Inicio</th>
                                <th>Fch Hasta</th>
                                <th>Periodo</th>
                                <th>Empleado</th>
                                <th>Estado</th>                                                           
                            </thead>
                            <hr>
                            <tbody>
                                @foreach ($liquidaciones as $item)  
                                    <tr>
                                        <td class="mithcmd miColc">{{$item->vac_nombre}}</td>
                                        <td>{{$item->vac_idLiquidacion}}</td>                                       
                                        <td >{{$item->vac_fechaInicio}}</td>
                                        <td >{{$item->vac_fechaFinal}}</td>
                                        <td class="centro">{{$item->vac_estado}}</td>
                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->vac_idEmpresa}}
                                        </td>                          
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- {{ $datos->links()}} --}}
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

@section('scripts')
    <script> 
    $(document).ready(function(){
   
    });

  </script>
@endsection