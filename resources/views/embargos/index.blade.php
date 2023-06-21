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
                        <a class="btn btn-primary btn-sm" href="{{ route('embargos/embargos.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                    
                    @endif
                    @if (auth()->user()->profile != 'C') 
                        <a class="btn btn-success btn-sm" href="{{ route('embargos/embargos.export')}}">
                        <i class="fa-solid fa-plus"></i> A Excel</a>
                    @endif                    
                    <span class="miTituloForm"> EMBARGOS</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Empleado</th>
                                <th>Tercero</th>
                                <th>Cuota Mes</th>
                                <th>Valor Total</th>
                                <th>Estado</th>
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
                                        <td>{{$item->emb_valorCuota}}</td>
                                        <td>{{$item->emb_valorTotal}}</td>
                                        <td class="mithcmd miColc">{{$item->emb_estado}}<td>
                                        @if (auth()->user()->profile == 'A') 
                                        <td class="mithcmd">
                                            <form action="{{ route('embargos/embargos.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('embargos/embargos.show',$item->id.'|'.$item->ter_nombre.
                                                '|'.$item->empl_primerApellido.'|'.$item->empl_otroApellido .'|'.$item->empl_primerNombre.'|'.$item->empl_otroNombre)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> Eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->emb_idEmpresa}}
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

@section('scripts')
    <script> 
    $(document).ready(function(){
   
    });
  </script>
@endsection