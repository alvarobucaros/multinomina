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
                                <th>EPS</th>
                                <th>APF</th>
                                <th>ARL  (%)</th>
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
                            <td>
                                <select name="ing_EPS" id="ing_EPS"  class="form_control ">
                                    @if(!empty($tipos))
                                        @foreach ($tipos as $tipo)                               
                                            <option value="{{$tipo->id}}" @selected($tipo->id == $item->ing_EPS)>
                                                {{$tipo->codigo}}   </option>
                                        @endforeach                    
                                    @endif                                     
                                </select>
                            </td>

                            <td>
                                <select name="ing_AFP" id="ing_AFP"  class="form_control ">
                                    @if(!empty($tipos))
                                        @foreach ($tipos as $tipo)                               
                                            <option value="{{$tipo->id}}" @selected($tipo->id == $item->ing_AFP)>
                                                {{$tipo->codigo}}   </option>
                                        @endforeach                    
                                    @endif                                     
                                </select>
                            </td>                            
                            <td>
                                <select name="ing_ARL" id="ing_ARL"  class="form_control ">
                                    @if(!empty($tipos))
                                        @foreach ($tipos as $tipo)                               
                                            <option value="{{$tipo->id}}" @selected($tipo->id == $item->ing_ARL)>
                                                {{$tipo->codigo}}   </option>
                                        @endforeach                    
                                    @endif                                     
                                </select>
                                {{$item->ing_porcARL}}
                            </td>                             

                            <td>{{$item->ing_porcRetefuente}}</td>
                            <td>{{$item->ing_numeroContrato}}</td>
                            <td>{{$item->car_salario}}</td>
                          
                            <td class="centro">{{$item->ing_estado}}</td>
                            @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
                                <td class="mithcmd">
                                    <form action="{{ route('ingresos/ingresos.edit',$item->id)}}" method="GET">
                                        <button class="btn btn-sm btn-primary">
                                        <span class="fa-solid fa-pen"></span> Edita
                                        </button>         
                                    </form>
                                </td>
                                <td class="mithcmd">
                                    <form action="{{ route('ingresos/ingresos.show',$item->id.'|'.$item->ter_nombre.
                                        '|'.$item->empl_primerApellido.'|'.$item->empl_otroApellido .'|'.$item->empl_primerNombre.'|'.$item->empl_otroNombre)}}" method="GET">
                                        <button class="btn btn-sm btn-danger">
                                        <span class="fa-solid fa-trash-can"></span> Eliminar</button>
                                        </button>          
                                    </form>      
                                </td>
                            @endif

                            <td style='display: none'>
                                {{$item->id}}
                                {{$item->ing_idEmpresa}}
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