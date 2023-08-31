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
                        <a class="btn btn-primary btn-sm" href="{{ route('ingresos/ingresos.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                   @endif

                    <a class="btn btn-success btn-sm" href="{{ route('ingresos/ingresos.export')}}">
                    <i class="fa-solid fa-file-excel"></i> A Excel</a>
                    <a class="btn btn-info btn-sm" href="{{ route('home.index')}}">
                        <i class="fa-solid fa-file-excel"></i> Menú </a>
                    <span class="miTituloForm"> INGRESOS</span>
                </p>
              
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Dependencia</th>
                                <th>FchIngreso</th>
                                <th>FchRetiro</th>                                
                                <th>Retefuente</th>
                                <th>Contrato</th>
                                <th>Salario</th>
                                <th>Estado</th>
                                @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                    <th colspan="2" class="centro">Acciones</th>
                                @endif                            
                            </thead>

                <tbody>
                    @foreach ($datos as $item)  
                        <tr>
                            <td>{{$item->empl_primerApellido}} {{$item->empl_otroApellido}}
                                {{$item->empl_primerNombre}} {{$item->empl_otroNombre}}</td>
                            <td>{{$item->car_nombre}}</td>
                            <td>{{$item->dep_nombre}}</td>
                            <td>{{$item->ing_fechaIngreso}}</td>
                            <td>{{$item->ing_fechaRetiro}}</td>
                            <td>{{$item->ing_porcRetefuente}}</td>
                            <td>{{$item->ing_numeroContrato}}</td>
                            <td class="derecha">@php echo number_format($item->car_salario,0,",",".");  @endphp </td>                         
                            <td class="centro">{{$item->ing_estado}}</td>
                                 <td class="mithcmd">
                                    <form action="{{ route('ingresos/ingresos.edit',$item->id)}}" method="GET">
                                        <button class="btn btn-sm btn-primary">
                                        <span class="fa-solid fa-pen"></span> Ver
                                        </button>         
                                    </form>
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