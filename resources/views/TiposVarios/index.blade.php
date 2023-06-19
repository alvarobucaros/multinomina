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
                        <i class="fa-solid fa-file-excel"></i> Menú </a>
                    @if (auth()->user()->profile == 'A') 
                        <a class="btn btn-primary btn-sm" href="{{ route('tiposvarios/tiposvarios.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                        <a class="btn btn-success btn-sm" href="{{ route('tiposvarios/tiposvarios.export')}}">
                        <i class="fa-solid fa-file-excel"></i> A Excel</a>
                    @endif
                    <span class="miTituloForm"> TIPOS VARIOS</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Clase</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                @if (auth()->user()->profile == 'A') 
                                    <th colspan="2" >Acciones</th>
                                @endif                               
                            </thead>
                          <hr>

                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td>{{$item->tt_clase}}</td>
                                        <td>{{$item->tt_codigo}}</td>
                                        <td>{{$item->tt_descripcion}}</td>
                                        <td class="mithcmd miColc">{{$item->tt_estado}}</td>
                                        @if (auth()->user()->profile == 'A') 
                                        <td class="mithcmd">
                                            <form action="{{ route('tiposvarios/tiposvarios.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('tiposvarios/tiposvarios.show',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->tt_idEmpresa}}
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