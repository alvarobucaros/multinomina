@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>MULTI <strong>NOMINA</strong> </h1>
            <h3>$request->post('id');</h3>
            <p>{{config(['constants.NOM_EMPRESA'])}}  {{config(['constants.EMPRESA'])}}</p>
            <p class="lead">Aplicación de Nómina .. 2023</p>
            <img class="mb-4" src="{!! url('img/dibujos/Trabajando.jpg') !!}" alt="" width="200" height="150">
        @endauth
  
        @guest
            <h2>Prevención</h2>
            <p class="lead">Estás viendo la página de inicio. Ingrese para ver los contenidos.</p>
        @endguest
    </div>
@endsection