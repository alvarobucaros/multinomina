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

                        <a class="btn btn-warning btn-sm" href="{{ route('diasHabiles/diasHabiles.creaano')}}">
                        <i class="fa-solid fa-plus"></i> Crea un año</a>
                    @endif
                    @if (auth()->user()->profile != 'C') 
                        <a class="btn btn-success btn-sm" href="{{ route('diasHabiles/diasHabiles.export')}}">
                        <i class="fa-solid fa-plus"></i> A Excel</a>
                    @endif
                    <span class="miTituloForm"> DIAS HABILES</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Fecha</th>
                                <th>Estado</th>
                                @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                    <th colspan="2" class="centro">Acciones</th>
                                @endif                                     
                            </thead>
                          <hr>

                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td>{{$item->dias_fecha}}</td>
                                        <td class="mithcmd miColc">{{$item->dias_habil}}</td>
                                        @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                        <td class="mithcmd">
                                            <form action="{{ route('diasHabiles/diasHabiles.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('diasHabiles/diasHabiles.show',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->dias_idEmpresa}}
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