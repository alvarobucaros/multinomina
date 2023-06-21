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
      @yield('contenido')    
    </div>     
</body>

@yield('scripts') 

{{--
  @yield('scripts') 

  <script>                    
  $(document).ready(function(){

  });

  $('#cp_cuotas').on('blur', function(e){
 
        var valor = e.target.value;
        var deuda = document.getElementById('cp_valorCobro').value;    
        if (valor > 0 ){
          document.getElementById('cp_valorCuota').value = deuda / valor;
        }else{
          document.getElementById('cp_valorCuota').value = 0;
        }
    });

</script> --}}
</html>