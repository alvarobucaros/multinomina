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
                        <a class="btn btn-primary btn-sm" href="{{ route('licencias/licencias.create')}}">
                        <i class="fa-solid fa-plus"></i> Nuevo</a>
                   @endif

                    <a class="btn btn-success btn-sm" href="{{ route('licencias/licencias.export')}}">
                    <i class="fa-solid fa-file-excel"></i> A Excel</a>
                    <a class="btn btn-info btn-sm" href="{{ route('home.index')}}">
                        <i class="fa-solid fa-file-excel"></i> Menú </a>
                    <span class="miTituloForm"> LICENCIAS</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Empleado</th>
                                <th>tipo</th>
                                <th>Fch Inicio</th>
                                <th>Fch Final</th>
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
                                           
                                        <td>
                                        @switch($item->lic_tipo)
                                        @case('MT')
                                            <span>Maternidad, lactancia y aborto</span>
                                            @break                                    
                                        @case('PT')
                                            <span>Paternidad</span>
                                            @break
                                        @case('CO')
                                            <span>Desempeño de cargo oficial</span>
                                            @break                                    
                                        @case('CD')
                                            <span>Calamidad Doméstica</span>
                                            @break 
                                        @case('LU')
                                            <span>Licencia de Luto</span>
                                            @break                                    
                                        @case('ES')
                                            <span>Licenia de Estudio</span>
                                            @break                                     
                                        @default
                                            <span>Licencia NO remunerada</span>
                                    @endswitch
                                </td>



                                        <td>{{$item->lic_fechainicio}}</td>
                                        <td>{{$item->lic_fechaFinal}}</td>
                                        <td class="mithcmd miColc">{{$item->lic_estado}}</td>
                                        @if (auth()->user()->profile == 'A') 
                                        <td class="mithcmd">
                                            <form action="{{ route('licencias/licencias.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>

                                        <td class="mithcmd">
                                            <form action="{{ route('licencias/licencias.show',$item->id.'|'.$item->lic_tipo.
                                                '|'.$item->empl_primerApellido.'|'.$item->empl_otroApellido .'|'.$item->empl_primerNombre.'|'.$item->empl_otroNombre)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->lic_idEmpresa}}
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