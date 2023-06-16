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
                    <a class="btn btn-primary btn-sm" href="{{ route('empleados/empleados.create')}}">
                    <i class="fa-solid fa-plus"></i> Nuevo</a>
                    <a class="btn btn-success btn-sm" href="{{ route('empleados/empleados.export')}}">
                    <i class="fa-solid fa-file-excel"></i> A Excel</a>
                    <a class="btn btn-info btn-sm" href="{{ route('home.index')}}">
                        <i class="fa-solid fa-file-excel"></i> Menú </a>
                    <span class="miTituloForm"> EMPLEADOS </span>
                </p>               
                <p>
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Primer Nombre</th>
                                <th>Otro Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Otro Apellido</th>
                                <th>Tipodoc</th>
                                <th>Nrodoc</th>
                                <th>Código</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Fch Ingreso</th>
                                <th>Fch Retiro</th>
                                <th>Estado</th>
                                <th colspan="2" >Acciones</th>
                            </thead>
                          <hr>
                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td>{{$item->empl_primerNombre}}</td>
                                        <td>{{$item->empl_otroNombre}}</td>
                                        <td>{{$item->empl_primerApellido}}</td>
                                        <td>{{$item->empl_otroApellido}}</td>
                                        <td>{{$item->empl_tipodoc}}</td>
                                        <td>{{$item->empl_nrodoc}}</td>                                                  
                                        <td>{{$item->empl_codigo}}</td>
                                        <td>{{$item->empl_email}}</td>
                                        <td>{{$item->empl_telefono}}</td>
                                        <td>{{$item->empl_fechaIngreso}}</td>
                                        <td>{{$item->empl_fechaRetiro}}</td>
                                        
                                        <td>{{$item->empl_estado}}</td>
                                        <td>
                                            <form action="{{ route('empleados/empleados.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('empleados/empleados.show',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->empl_idEmpresa}}
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