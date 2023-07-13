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
                    <a class="btn btn-info btn-sm" href="{{ route('vacaciones')}}">
                        <i class="fa-solid fa-plus"></i> Menú </a>   
                        @foreach ($empleados as $empleado) 
                            @php                                
                                $fecha1= new DateTime($empleado->ing_fchUltimaVacacion);
                                $fecha2= new DateTime("2023-08-04");
                                $diff = ($fecha1->diff($fecha2));
                                $d = $diff->days;
                                $per =  number_format($d / 365, 2 );
                            @endphp 
                            <span class="miMayuscula">LIBRO DE VACACIONES DE : </span>  
                            <span class="miMayuscula">{{ $empleado->empl_primerNombre}} {{ $empleado->empl_otroNombre}}
                            {{ $empleado->empl_primerApellido}} {{ $empleado->empl_otroApellido}}</span>
                            <div class="input mb-vac_fechainicio1">
                                <label for="ing_fchUltimaVacacion" class="col-md-2 control-label dereha">Fecha ultimas vacaciones :</label>
                                <input type="date" name="ing_fchUltimaVacacion" id="ing_fchUltimaVacacion" class="form_control col-md-1"
                                readonly value="{{$empleado->ing_fchUltimaVacacion}}">
                           
                                <label for="pendientes" class="col-md-2 control-label derecha">Periodos pendientes :</label>
                                <input type="text" name="pendientes" id="pendientes" class="form_control col-md-1"
                                readonly value="{{$per}}"  >
                            </div>
                        
                            <div>
                                <label for="vac_fechainicio" class="col-md-2 control-label">Fecha Inicio vacaciones :</label>
                                <input type="date" name="vac_fechainicio" id="vac_fechainicio" class="form_control col-md-2"
                                required   >
                            </div>
                            <div>
                                <label for="vac_dias" class="col-md-2 control-label">Dìas a disfrutar :</label>
                                <input type="text" name="vac_dias" id="vac_dias" class="form_control col-md-1"
                                required  value='15' onchange="periodos();" >
                                <label for="periDisfrutar" class="col-md-2 control-label derecha">Periodos a disfrutar :</label>
                                <input type="text" name="periDisfrutar" id="periDisfrutar" class="form_control col-md-1"
                                readonly value="1"  >
                            </div>                 
                        @endforeach
                        <br>
                        <div>
                            <a class="btn btn-warning btn-sm" href="{{ route('vacaciones')}}">
                                <i class="fa-solid fa-plus"></i> Liquidar vacaciones </a> 
                        </div>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                
                                <th>Nombre</th>
                                <th>Liquidación</th>
                                <th>Fch Inicio</th>
                                <th>Fch Hasta</th>
                                <th>Estado</th>
                                @if (auth()->user()->profile == 'A') 
                                    <th colspan="2" >Acciones</th>
                                @endif                               
                            </thead>
                          <hr>

                            <tbody>

                                @foreach ($datos as $item)  
                                    <tr>
                                        <td class="mithcmd miColc">{{$item->vac_nombre}}</td>
                                        <td>{{$item->vac_idLiquidacion}}</td>                                       
                                        <td >{{$item->vac_fechaInicio}}</td>
                                        <td >{{$item->vac_fechaFinal}}</td>
                                        <td class="centro">{{$item->vac_estado}}</td>
                                        @if (auth()->user()->profile == 'A') 
                                        <td class="mithcmd">
                                            <form action="{{ route('vacaciones/vacaciones.edit',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-primary">
                                                <span class="fa-solid fa-pen"></span> Edita
                                                </button>         
                                            </form>
                                        </td>
                                        <td class="mithcmd">
                                            <form action="{{ route('vacaciones/vacaciones.show',$item->id)}}" method="GET">
                                                <button class="btn btn-sm btn-danger">
                                                <span class="fa-solid fa-trash-can"></span> Eliminar</button>
                                                </button>         
                                            </form>      
                                        </td>
                                        @endif

                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->vac_idEmpresa}}
                                        </td>                          
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- {{ $datos->links()}} --}}
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
    function periodos(){
       
        var dias=document.getElementById("vac_dias").value; 
        var p = (dias / 15).toFixed(2);        
        document.getElementById('periDisfrutar').value=p;
    }
  </script>
@endsection