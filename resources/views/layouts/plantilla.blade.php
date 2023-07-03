<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tituloPagina')</title>
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('css/app.css') !!}" rel="stylesheet">

    <script src="{!! url('js/jQuery-2.2.0.min.js') !!}"></script>
</head>
<body>
    <div class="container miForm">
      <p class="mayuscula"> 
      @yield('tituloPagina') 
      </p>
      @yield('contenido')    
    </div>     
</body>

@yield('scripts') 

</html>