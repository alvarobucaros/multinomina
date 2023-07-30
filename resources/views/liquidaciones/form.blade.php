@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <div class="card">
            <div class="card-body">
                  
                <p>
                    @php
                        echo (' <span class="miMayuscula">LIQUIDACION : ' . $data [4] .'</span> ');
                    @endphp
           
                    <br>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">                            
                                <th>liquidación</th>
                                <th>periodo</th>
                                <th>Fecha desde</th>
                                <th>Fecha hasta</th>
                                <th class="centro">Estado</th>  
                                @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                    <th colspan="2" class="centro">Acciones</th>
                                @endif                                                            
                            </thead>
                            <hr>
                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td class="mithcmd miColc">{{$item->id}}</td>
                                        <td>{{$item->liq_periodo}}</td>                                       
                                        <td >{{$item->liq_fechaDesde}}</td>
                                        <td >{{$item->liq_fechaHasta}}</td>
                                        <td class="centro">{{($item->liq_estado == 'P') ? 'Pendiente' : 'Cerrada'}}</td> 
                                        <td class="mithcmd">
                                            <form action="{{ route('liquidaciones/liquidaciones/verMovimientos',$item->id)}}" method="GET">
                                                <button class="btn btn-sm miButton">
                                                <span class="fa-solid fa-trash-can"></span> Ver liquidación</button>
                                                </button>         
                                            </form>      
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        <hr>
                       
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