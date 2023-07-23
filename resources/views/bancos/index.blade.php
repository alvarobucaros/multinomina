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
                        <a class="btn btn-primary btn-sm" href="{{ route('bancos/bancos.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                    @endif
                    @if (auth()->user()->profile != 'C') 
                        <a class="btn btn-success btn-sm" href="{{ route('bancos/bancos.export')}}">
                        <i class="fa-solid fa-plus"></i> A Excel</a>
                    @endif
                    <span class="miTituloForm"> LISTA DE BANCOS</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Código</th>
                                <th>Nombre</th>
           
                                @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                    <th colspan="2" class="centro">Acciones</th>
                                @endif                               
                            </thead>
                          <hr>
                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td>{{$item->ban_codigo}}</td>      
                                        <td>{{$item->ban_nombre}}</td> 
               
                                        @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                        <td class="mithcmd">
                                            <form action="{{ route('bancos/bancos.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('bancos/bancos.show',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->ban_idEmpresa}}
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