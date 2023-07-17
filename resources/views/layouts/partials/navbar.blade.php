<script>
  $(function(){
    $('ul#menu li').hover(function(){
        //$('#drop' , this).css('display','block');
         $(this).children('ul').delay(20).slideDown(200);
    }, function(){
         $(this).children('ul').delay(20).slideUp(200);
    });
  });
</script>

<div class="navbar navbar-dark bg-dark shadow-sm">
  <div class="container">
    <div class="navbar-brand d-flex align-items-center">
      <img src="/img/dibujos/mnomina.ico" alt="" srcset="">
      <div  class="tit1 p-2">Multi<strong class="tit2">Nómina</strong></div> 
      <div  class="p-6"><span class="tit1 p-2"> @php  echo Config::get('app.config_empresa')  @endphp</span></div>
      <div  class="p-3 align-self-end"><span  class="tit2"> Usuario: 
        <a href="{{ route('user/user.changepwd', auth()->user()->id)}}" class="tit2"> 
          
           @php  $pr='Consulta';
          if(auth()->user()->profile=='A'){$pr='Admin';}
          if(auth()->user()->profile=='O'){$pr='Opera';}
             echo auth()->user()->name . ' ( '. $pr . ' ) ' @endphp</a> </span></div>
    </div>
  </div>

  {{-- menu principal --}}   
  <div>
      <nav class="menuCSS3">
          <ul>
              <li><a href="#" class="nav-link px-2 ">Parámetros</a>
                  <ul>
                      <li><a href="{{ route('empresas/empresas.edit',auth()->user()->empresa) }}" class="nav-link px-2 ">La Empresa</a></li>
                      <li><a href="{{ route('parametros',auth()->user()->empresa) }}" class="nav-link px-2 ">Param. Generales</a></li>
                      <li><a href="{{ route('tiposvarios') }}" class="nav-link px-2 ">Tipos varios</a></li>
                      @if (auth()->user()->profile == 'A') 
                        <li><a href="{{ route('user') }}" class="nav-link px-2 ">Usuarios</a></li>
                      @endif
                    </ul>
              </li>
              <li><a href="#" class="nav-link px-2 ">Tablas generales</a>
                  <ul>
                      <li><a href="{{ route('conceptos') }}" class="nav-link px-2 ">Conceptos</a></li>
                      <li><a href="{{ route('dependencias') }}" class="nav-link px-2 ">Dependencias</a></li>
                      <li><a href="{{ route('cargos') }}" class="nav-link px-2 ">Cargos</a></li>
                      <li><a href="{{ route('diasHabiles') }}" class="nav-link px-2 ">Dias hábiles</a></li>
                     
                      <li><a href="{{ route('terceros') }}" class="nav-link px-2 ">Terceros</a></li>
                  </ul>
              </li>
              <li><a href="#" class="nav-link px-2 ">Empleados</a>
                <ul>
                  <li><a href="{{ route('empleados') }}" class="nav-link px-2 ">Empleados</a>
                  <li><a href="{{ route('ingresos') }}" class="nav-link px-2 ">Ingresos</a>
                    <li><a href="{{ route('hvida') }}" class="nav-link px-2 ">Hoja de vida</a>
                  </ul>
              </li>
              <li><a href="#" class="nav-link px-2 ">Liquidación</a>
                  <ul>
                      <li><a href="{{ route('liquidaciones') }}" class="nav-link px-2 ">Liquida nómina</a></li>                  
                      <li><a href="{{ route('coopfondos') }}" class="nav-link px-2 ">Cooperativas Fondos</a></li>
                      <li><a href="{{ route('embargos') }}" class="nav-link px-2 ">Embargos</a></li>
                      <li><a href="{{ route('horas_extras') }}" class="nav-link px-2 ">Horas Extras</a></li>
                      <li><a href="{{ route('vacaciones') }}" class="nav-link px-2 ">Vacaciones</a></li>
                      <li><a href="{{ route('licencias') }}" class="nav-link px-2 ">Licencias</a></li>
                  </ul>
              </li>
              <li><a href="#" class="nav-link px-2 ">Informes y consultas</a>
                  <ul>
                    <li><a href="{{ route('desarrollo') }}" class="nav-link px-2 ">Desprendibles</a></li>
                    <li><a href="{{ route('desarrollo') }}" class="nav-link px-2 ">Prenómina</a></li>        
                    <li><a href="{{ route('desarrollo') }}" class="nav-link px-2 ">Lista de personal</a></li>
                    <li><a href="{{ route('desarrollo') }}" class="nav-link px-2 ">Planilla Pila</a></li>
                  </ul>    
              </li>
              <li><a href="#" class="nav-link px-2 ">Ayudas</a>
                <ul>
                  <li><a href="{{ route('desarrollo') }}" class="nav-link px-2 ">Documentación</a></li>

                </ul>
              </li>
           
              </li>
                  <li><a href="{{ route('logout.perform') }}">Logout</a>
              </li>

          </ul>
      </nav> 
  </div>
</div>

