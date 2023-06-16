@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('img/logo.png') !!}" alt="" width="112" height="60">
        
        <h1 class="h3 mb-3 fw-normal">Ingreso</h1>

        @include('layouts.partials.messages') 

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Usuario" required="required" autofocus>
            <label for="floatingName">Usuario o E-mail</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="" placeholder="Contraseña" required="required">
            <label for="floatingPassword">Contraseña</label>
                    
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="remember">Guárdame</label>
            <input type="checkbox" name="remember" value="1">
        </div>

        <button class="form-group mb-3 btn-primary" type="submit">Ingreso</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>   
    </form>
@endsection
