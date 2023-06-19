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
                    <a class="btn btn-info btn-sm" href="{{ route('home.index')}}">
                        <i class="fa-solid fa-plus"></i> Menú </a>
                    @if (auth()->user()->profile == 'A') 
                        <a class="btn btn-primary btn-sm" href="{{ route('coopfondos/coopfondos.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                 
                    @endif
                    @if (auth()->user()->profile != 'C') 
                        <a class="btn btn-success btn-sm" href="{{ route('coopfondos/coopfondos.export')}}">
                        <i class="fa-solid fa-plus"></i> A Excel</a>
                    @endif

                    <span class="miTituloForm"> Cooperativas y Fondos</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Empleado</th>
                                <th>Tercero</th>
                                <th>Valor total</th>
                                <th>Valor Cuota</th>
                                <th>Cuotas</th>
                                <th>Saldo</th>
                                <th>Fch Inicial</th>
                                <th>Fch Final</th>
                                <th>Descuenta</th>
                                @if (auth()->user()->profile == 'A') 
                                    <th colspan="2" >Acciones</th>
                                @endif                               
                            </thead>
                          <hr>

                            <tbody>
                                @foreach ($datos as $item) 
                                
                                    <tr>
                                        <td>{{$item->empl_primerApellido}} {{$item->empl_otroApellido}}
                                            {{$item->empl_primerNombre}} {{$item->empl_otroNombre}}</td>
                     
                                        <td>{{$item->ter_nombre}}</td> 
                                        <td class="derecha">{{$item->cof_valorTotal}}</td>                                
                                        <td class="centro">{{$item->cof_valorCuota}}</td>
                                        <td class="centro">{{$item->col_plazo}}</td>   
                                        <td class="centro">{{$item->cof_saldo}}</td>                                                              
                                        <td class="centro">{{$item->cof_fechaInicio}}</td>
                                        <td class="centro">{{$item->cof_fechaFinal}}</td>  
                                        <td class="centro">{{$item->cof_periDescuento}}</td> 
                                        @if (auth()->user()->profile == 'A') 
                                        <td class="mithcmd">
                                            <form action="{{ route('coopfondos/coopfondos.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('coopfondos/coopfondos.show',$item->id.'|'.$item->ter_nombre.
                                            '|'.$item->empl_primerApellido.'|'.$item->empl_otroApellido .'|'.$item->empl_primerNombre.'|'.$item->empl_otroNombre)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}} 
                                            {{$item->cof_idEmpresa}}
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