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

                  
                    <a class="btn btn-primary" href="{{ route('acumulados') }}"  method="get"> Regresa </a>
                                                         
                    <a class="btn btn-secondary" href="{{ route('acumulados/acumulados.createPDF','202301') }} "  method="post" > Export to PDF </a>
                    <a class="btn btn-success" href="{{ URL::to('#') }}"> Export to EXCEL </a>
                    <span class="miTituloForm"> ACUMULADOS DE NOMINA</span>
                </p>
                <p class="card-text">
                    <div class="table table-resposive-sm">
                        <table class="table table-sm table-bordered table-striped table-hover">
                            <thead class="table-success miThead">
                                <th>Periodo</th>
                                <th>Empleado</th>
                                <th>Concepto</th>
                                <th>Cantidad</th>
                                <th>Devengado</th>
                                <th>Deducido</th>
                                <th>Estado</th>                                
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)  
                                    <tr>
                                        <td>{{$item->acu_periodo}}</td>
                                        <td>{{$item->empl_primerNombre}} {{$item->empl_otroNombre}}
                                            {{$item->empl_primerApellido}} {{$item->empl_otroApellido}}</td>

                                        <td>{{$item->cp_descripcion}}</td>
                                        <td  class="centro">{{$item->acu_numero}}</td>
                                        
                                        <td class="derecha"> @php echo number_format($item->acu_debitos,0,",",".");  @endphp </td>
                                        <td class="derecha"> @php echo number_format($item->acu_creditos,0,",",".");  @endphp </td>
                                                                                                   
                                        <td class="centro">{{($item->acu_estado =  'P') ? 'Pendiente':'liquidada'}}</td>
  


                                        <td style='display: none'>
                                            {{$item->id}}
                                            {{$item->cp_idEmpresa}}
                                        </td>                          
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{-- <div class="row">
                            <div class="col-sm-12">
                                {{ $datos->links()}}
                            </div>
                        </div> --}}
                    </div>
                </p>
            </div>

        </div>
        @endauth

        {{-- https://www.positronx.io/laravel-pdf-tutorial-generate-pdf-with-dompdf-in-laravel/ --}}

        @guest
        <h1>Homepage</h1>
        <p class="lead">Estás viendo la página de inicio. Inicie sesión para ver los contenidos.</p>
        @endguest
    </div>
@endsection