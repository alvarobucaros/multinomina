<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alvaro Ortiz C.">
    <meta name="generator" content="AortizC 0.1.0">
    <title>Multi Nóminas</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/mc.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <script src="{!! url('js/jQuery-3.6.0.min.js') !!}"></script>

    <link href="/css/lbc-docs.min.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    
</head>
<body>
  @auth
    @include('layouts.partials.navbar')

    <main class="container">
        @yield('content')
    </main>
    
    @include('layouts.partials.footer')
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    @endauth
    <div>
      @yield('scripts')
    </div>
  </body>

  </html>
</html>
