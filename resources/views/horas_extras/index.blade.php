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
                    @if (auth()->user()->profile == 'A') 
                        <a class="btn btn-primary btn-sm" href="{{ route('horas_extras/horas_extras.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('horas_extras/horas_extras.liquida')}}">
                        <i class="fa-solid fa-plus"></i> Liquidar el período</a>
                   @endif

                    <a class="btn btn-success btn-sm" href="{{ route('horas_extras/horas_extras.export')}}">
                    <i class="fa-solid fa-file-excel"></i> A Excel</a>
                    <span class="miTituloForm"> HORAS EXTRAS</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Empleado</th>
                                <th>Periodo</th>
                                <th>hex_diurnas</th>
                                <th>Nocturnas</th>
                                <th>Fest Diurna</th>
                                <th>Fest Nocturnas</th>
                                <th>Estado</th>
                                @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                    <th colspan="2" class="centro">Acciones</th>
                                @endif                                
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td>{{$item->empl_primerNombre}} {{$item->empl_otroNombre}}
                                            {{$item->empl_primerApellido}} {{$item->empl_otroApellido}}</td>
                    
                                        <td>{{$item->hex_periodo}}</td>
                                        <td>{{$item->hex_diurnas}}</td>
                                        <td>{{$item->hex_nocturnas}}</td>
                                        <td>{{$item->hex_festivasDiurna}}</td>
                                        <td>{{$item->hex_festivasNocturna}}</td>
                                        <td class="centro">{{($item->hex_estado ==  'P') ? 'Pendiente':'liquidada'}}</td>
                                        @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                        <td class="mithcmd">
                                            <form action="{{ route('horas_extras/horas_extras.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">

                                            <form action="{{ route('horas_extras/horas_extras.show', $item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif
                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->hex_idEmpresa}}
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