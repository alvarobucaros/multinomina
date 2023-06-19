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
                        <a class="btn btn-primary btn-sm" href="{{ route('conceptos/conceptos.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('conceptos/conceptos.import')}}">
                        <i class="fa-solid fa-plus"></i> Importa</a>
                    @endif
                    @if (auth()->user()->profile != 'C') 
                        <a class="btn btn-success btn-sm" href="{{ route('conceptos/conceptos.export')}}">
                        <i class="fa-solid fa-plus"></i> A Excel</a>
                    @endif

                    <span class="miTituloForm"> CONCEPTOS</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Tipo</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fch Desde</th>
                                <th>Fch Hasta</th>
                                <th class="derecha">Valor Defecto</th>
                                <th class="derecha">Prtage Defecto</th>
                                <th>Estado</th>
                                @if (auth()->user()->profile == 'A') 
                                    <th colspan="2" >Acciones</th>
                                @endif                               
                            </thead>
                          <hr>

                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td class="centro">{{$item->cp_tipo}}</td>
                                        <td>{{$item->cp_titulo}}</td>
                                        <td>{{$item->cp_descripcion}}</td>
                                        <td>{{$item->cp_fechaDesde}}</td>
                                        <td>{{$item->cp_fechaHasta}}</td>
                                        <td class="derecha">{{$item->cp_valorDefault}}</td>
                                        <td class="derecha">{{$item->cp_porcentajeDefault}} %</td>                                      
                                                                                   
                                        <td class="centro">{{$item->cp_estado}}</td>
                                        @if (auth()->user()->profile == 'A') 
                                        <td class="mithcmd">
                                            <form action="{{ route('conceptos/conceptos.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('conceptos/conceptos.show',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->cp_idEmpresa}}
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