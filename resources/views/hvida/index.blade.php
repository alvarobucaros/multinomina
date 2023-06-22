<ul class='tabs' >
    <li><a href='#tab0'> Datos complementarios </a></li>
    <li><a href='#tab1'> Formación y Estudios </a></li>
    <li><a href='#tab2'> Experiencia Laboral </a></li>
    <li><a href='#tab3'> Núcleo Familiares </a></li>  
    <li><a href='#tab4'> Logros en la Empresa </a></li>
  </ul>

 <div class="card row mt-2">    
        <div id="tab0" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set"> 
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Información adicional del Empleado</span> 
                </div> 
            </div> 
        </div> 
        <div id="tab1" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set"> 
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Esttudios y Formación académica</span> 
                </div> 
            </div> 
        </div> 
        <div id="tab2" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set"> 
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Experiencia</span> 
                </div> 
            </div> 
        </div> 
        <div id="tab3" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set"> 
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Núcleo familar</span> 
                </div> 
            </div> 
        </div> 
        <div id="tab4" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set"> 
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Logros empresariales</span> 
                </div> 
            </div> 
        </div> 
    </div> 
    <div class="mb-1">
        <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Menú</a>
    @if (auth()->user()->profile == 'A') 
        {{-- <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>   --}}
    @endif
{{-- <div class="card row mt-2">
    @foreach ($datos as $parametros) 
        <div id="tab1" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set"> 
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Generales</span>     
                    <div class="input mb-1">
                        <label for="par_porcCaja" class="col-md-2 control-label">Caja de compensación :</label>
                        <input type="number" name="par_porcCaja" id="par_porcCaja" class="form_control "
                        required value="{{$parametros->par_porcCaja}}">
        
                        <label for="par_porcICBF" class="col-md-2 control-label derecha">ICBF :</label>
                        <input type="number" name="par_porcICBF" id="par_porcICBF" class="form_control "
                        required value="{{$parametros->par_porcICBF}}">
                    </div> 
                    <div class="input mb-1">
                        <label for="par_porSENA" class="col-md-2 control-label">SENA :</label>
                        <input type="number" name="par_porSENA" id="par_porSENA" class="form_control "
                        required value="{{$parametros->par_porSENA}}">
                
                        <label for="par_porcESAP" class="col-md-2 control-label derecha">ESAP :</label>
                        <input type="number" name="par_porcESAP" id="par_porcESAP" class="form_control "
                        required value="{{$parametros->par_porcESAP}}">
                    </div> 
                    <div class="input mb-1">
                        <label for="par_porcFODE" class="col-md-2 control-label">FODE :</label>
                        <input type="number" name="par_porcFODE" id="par_porcFODE" class="form_control "
                        required value="{{$parametros->par_porcFODE}}">
                        <label for="par_porcRiesgos" class="col-md-2 control-label derecha">Porcentaje Riesgos :</label>
                        <input type="number" name="par_porcRiesgos" id="par_porcRiesgos" class="form_control "
                        required value="{{$parametros->par_porcRiesgos}}">
                    </div> 
                    <div class="input mb-1">
                        <label for="par_smmlv" class="col-md-2 control-label">SMMLV:</label>
                        <input type="text" name="par_smmlv" id="par_smmlv" class="form_control "
                        required value="{{$parametros->par_smmlv}}">
                        <label for="par_auxTransporte" class="col-md-2 control-label derecha">Aux Transporte:</label>
                        <input type="text" name="par_auxTransporte" id="par_auxTransporte" class="form_control "
                        required value="{{$parametros->par_auxTransporte}}">
                    </div>
                    <div class="input mb-1">
                        <label for="par_diasVacaciones" class="col-md-2 control-label">Días Vacaciones:</label>
                        <input type="text" name="par_diasVacaciones" id="par_diasVacaciones" class="form_control "
                        required value="{{$parametros->par_diasVacaciones}}">
                    
                    </div>
                </div>       
            </div>
        </div>
        <div id="tab2" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set">
            <div class="card-body">        
                <div class="card-text">   
                <span class="miSubTitulo">Horas extras</span>
                <div class="input mb-1">
                    <label for="par_horasdiurna" class="col-md-2 control-label">Diurna:</label>
                    <input type="number" name="par_horasdiurna" id="par_horasdiurna" class="form_control "
                    required value="{{$parametros->par_horasdiurna}}">

                    <label for="par_horasnocturna" class="col-md-2 control-label derecha">Nocturna:</label>
                    <input type="number" name="par_horasnocturna" id="par_horasnocturna" class="form_control "
                    required value="{{$parametros->par_horasnocturna}}">
                    </div>

                    <div class="input mb-1">
                        <label for="par_festivadiurna" class="col-md-2 control-label">Diurna Festivo:</label>
                        <input type="number" name="par_festivadiurna" id="par_festivadiurna" class="form_control "
                        required value="{{$parametros->par_festivadiurna}}">
                        <label for="par_festivanocturna" class="col-md-2 control-label derecha">Nocturna Festivo:</label>
                        <input type="number" name="par_festivanocturna" id="par_festivanocturna" class="form_control "
                        required value="{{$parametros->par_festivanocturna}}">
                    </div>
                </div>
            </div>
        </div>
        <div id="tab3" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set">
            <div class="card-body">        
                <div class="card-text">   
                    <span class="miSubTitulo">Firmas</span>
                    <div class="input mb-1">
                        <label for="par_representante" class="col-md-2 control-label">Representante Legal:</label>
                        <input type="text" name="par_representante" id="par_representante" class="form_control "
                        required value="{{$parametros->par_representante}}">
                        <label for="par_nroDocRepresentante" class="col-md-2 control-label derecha">Nro Documento Legal:</label>
                        <input type="text" name="par_nroDocRepresentante" id="par_nroDocRepresentante" class="form_control "
                        required value="{{$parametros->par_nroDocRepresentante}}">
                        <label for="par_tipoDocRepresentante" class="col-md-1 control-label derecha">Tipo Doc :</label>
                        <input type="radio" name="par_tipoDocRepresentante" id="tipoRC" 
                        value="C"  @if ($parametros->par_tipoDocRepresentante=='C') checked @endif> Cédula
                        <input type="radio" name="par_tipoDocRepresentante" id="tipoRC"
                        value="E"  @if ($parametros->par_tipoDocRepresentante=='E') checked @endif> Ced Extranjero
          
                </div>
                    <div class="input mb-1">
                        <label for="par_tesorero" class="col-md-2 control-label">Tesorero:</label>
                        <input type="text" name="par_tesorero" id="par_tesorero" class="form_control "
                        required value="{{$parametros->par_tesorero}}">
                        <label for="par_nroDocTesorero" class="col-md-2 control-label derecha">Nro Documento Tesorero:</label>
                        <input type="text" name="par_nroDocTesorero" id="par_nroDocTesorero" class="form_control "
                        required value="{{$parametros->par_nroDocTesorero}}">
                        
                        <label for="par_tipoDocTesorero" class="col-md-1 control-label derecha">Tipo Doc :</label>
                            <input type="radio" name="par_tipoDocTesorero" id="tipoTC" 
                            value="C"  @if ($parametros->par_tipoDocTesorero=='C') checked @endif> Cédula
                            <input type="radio" name="par_tipoDocTesorero" id="tipoTC"
                            value="E"  @if ($parametros->par_tipoDocTesorero=='E') checked @endif> Ced Extranjero
                    </div>
                </div>
            </div>
        </div>
        <div id="tab4" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set">
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Liquidación</span>
                    <div class="input mb-1">
                        <label for="par_periodo" class="col-md-2 control-label">Periodo liquidación:</label>
                        <input type="text" name="par_periodo" id="par_periodo" class="form_control "
                        required value="{{$parametros->par_periodo}}">
                        <label for="par_liquidacion" class="col-md-1 control-label derecha">Liquida :</label>
                        <input type="radio" name="par_liquidacion" id="liquidaM" 
                        value="M"  @if ($parametros->par_liquidacion=='M') checked @endif> Mensual
                        <input type="radio" name="par_tipoDocTesorero" id="liquidaQ"
                        value="Q"  @if ($parametros->par_liquidacion=='Q') checked @endif> Quincenal
                    </div>

                    <div class="input mb-1">
                        <label for="par_fondoRiesgos" class="col-md-2 control-label">Fondo de riesgos:</label>
                        <input type="text" name="par_fondoRiesgos" id="par_fondoRiesgos" class="form_control "
                        required value="{{$parametros->par_fondoRiesgos}}">
                    </div>
                    <div class="input mb-1">
                        <label for="par_CajaSubsidio" class="col-md-2 control-label">Caja compensación:</label>
                        <input type="text" name="par_CajaSubsidio" id="par_CajaSubsidio" class="form_control "
                        required value="{{$parametros->par_CajaSubsidio}}">
                    </div>
              
                </div>
            </div> 
        </div>
    @endforeach 
    <div class="mb-1">
        <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Menú</a>
    @if (auth()->user()->profile == 'A') 
        <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>  
    @endif
    
    (   par_fondoRiesgos ,  par_CajaSubsidio    
    </div> 
    <div style='display: none'>
        <input type="text" name="id" id="id" value="{{$parametros->id}}">
        <input type="text" name="par_idEmpresa" id="par_idEmpresa" value="{{$parametros->par_idEmpresa}}">
    </div>
</div> --}}

<script>
    $('ul.tabs').each(function(){
      // Para cada conjunto de pestañas, queremos realizar un seguimiento de 
      // qué pestaña está activa y su contenido asociado
      var $active, $content, $links = $(this).find('a');
    
     // Si location.hash coincide con uno de los enlaces, utilícelo como la pestaña activa. 
    // Si no se encuentra ninguna coincidencia, use el primer enlace como la pestaña activa inicial.

      $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
      $active.addClass('active');
    
      $content = $($active[0].hash);
    
      // Hide the remaining content
      $links.not($active).each(function () {
        $(this.hash).hide();
      });
    
      // Bind the click event handler
      $(this).on('click', 'a', function(e){
        // Make the old tab inactive.
        $active.removeClass('active');
        $content.hide();
    
        // Update the variables with the new link and content
        $active = $(this);
        $content = $(this.hash);
    
        // Make the tab active.
        $active.addClass('active');
        $content.show();
    
        // Prevent the anchor's default click action
        e.preventDefault();
      });
    });
    </script>
    
    <!-- >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Nov 27, 2017 9:41:16   <<<<<<< -->
    
