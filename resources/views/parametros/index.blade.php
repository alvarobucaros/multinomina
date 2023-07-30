<ul class='tabs' >
    <li><a href='#tab1'> Generales </a></li>
    <li><a href='#tab2'> Horas Extras </a></li>
    <li><a href='#tab3'> Firmas </a></li>
    <li><a href='#tab4'> Liquidacion </a></li>
    <li><a href='#tab5'> Retefuente </a></li>
  </ul>

<div class="card row mt-2">
    @foreach ($datos as $parametros) 
        <div id="tab1" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set"> 
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Generales</span>     
                    <div class="input mb-1">
                        <label for="par_porcCaja" class="col-md-2 control-label">Caja de compensación :</label>
                        <input type="text" name="par_porcCaja" id="par_porcCaja" class="form_control "
                        required value="{{$parametros->par_porcCaja}}">
        
                        <label for="par_porcICBF" class="col-md-2 control-label derecha">ICBF :</label>
                        <input type="text" name="par_porcICBF" id="par_porcICBF" class="form_control "
                        required value="{{$parametros->par_porcICBF}}">
                    </div> 
                    <div class="input mb-1">
                        <label for="par_porSENA" class="col-md-2 control-label">SENA :</label>
                        <input type="text" name="par_porSENA" id="par_porSENA" class="form_control "
                        required value="{{$parametros->par_porSENA}}">
                
                        <label for="par_porcESAP" class="col-md-2 control-label derecha">ESAP :</label>
                        <input type="text" name="par_porcESAP" id="par_porcESAP" class="form_control "
                        required value="{{$parametros->par_porcESAP}}">
                    </div> 
                    <div class="input mb-1">
                        <label for="par_porcFODE" class="col-md-2 control-label">FODE :</label>
                        <input type="text" name="par_porcFODE" id="par_porcFODE" class="form_control "
                        required value="{{$parametros->par_porcFODE}}">
                        <label for="par_porcRiesgos" class="col-md-2 control-label derecha">Porcentaje Riesgos :</label>
                        <input type="text" name="par_porcRiesgos" id="par_porcRiesgos" class="form_control "
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
                  
                        <label for="par_horasMes" class="col-md-2 control-label derecha">Horas mensuales:</label>
                        <input type="text" name="par_horasMes" id="par_horasMes" class="form_control "
                        required value="{{$parametros->par_horasMes}}">                    
                    </div>
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
                </div>       
            </div>
        </div>
        <div id="tab2" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set">
            <div class="card-body">        
                <div class="card-text">   
                <span class="miSubTitulo">Horas extras</span>
                <br>
                <span>Día Ordinario</span>
                <div class="input mb-1">
                    <label for="par_horasdiurna" class="col-md-2 control-label">Diurna:</label>
                    <input type="text" name="par_horasdiurna" id="par_horasdiurna" class="form_control "
                    required value="{{$parametros->par_horasdiurna}}">

                    <label for="par_horasnocturna" class="col-md-2 control-label derecha">Nocturna:</label>
                    <input type="text" name="par_horasnocturna" id="par_horasnocturna" class="form_control "
                    required value="{{$parametros->par_horasnocturna}}">
                </div>
                <span>Día dominical y/o festivo</span>

                <div class="input mb-1">
                    <label for="par_festivadiurna" class="col-md-2 control-label">Diurna Festivo:</label>
                    <input type="text" name="par_festivadiurna" id="par_festivadiurna" class="form_control "
                    required value="{{$parametros->par_festivadiurna}}">
                    <label for="par_festivanocturna" class="col-md-2 control-label derecha">Nocturna Festivo:</label>
                    <input type="text" name="par_festivanocturna" id="par_festivanocturna" class="form_control "
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
            <div class="card-body myCard">        
                <div class="card-text">
                    <span class="miSubTitulo">Código de conceptos</span>
                    
                        <div class="card">
                            <h5 class="card-title">Devengados</h5>
                        
                                <div class="input mb-1">
                                    <label  class="col-md-3 control-label">Salario:</label>
                                    <input type="text" name="par_codigo_salario"  class="form_control col-md-1 derecha"
                                    onclick="selConcepto('D1')"  id='D1' maxlength="3" value="{{$parametros->par_codigo_salario}}">                         
                                         
                                    <label  class="col-md-3 control-label derecha">Aux transporte:</label>
                                    <input type="text" name="par_codigo_trasporte"  class="form_control col-md-1 derecha"
                                    onclick="selConcepto('D2')" id='D2' maxlength="3"    value="{{$parametros->par_codigo_trasporte}}">
                                </div>
                                <div class="input mb-1">
                                    <label  class="col-md-3 control-label">Extras:</label>
                                    <input type="text" name="par_codigo_hrsRxtras"  class="form_control col-md-1 derecha"
                                    onclick="selConcepto('D3')" id='D3' maxlength="3" value="{{$parametros->par_codigo_hrsRxtras}}">                         
               
                                    <label  class="col-md-3 control-label derecha">Bonos:</label>
                                    <input type="text" name="par_codigo_bonos"  class="form_control col-md-1 derecha"
                                    onclick="selConcepto('D4')" id='D4' maxlength="3"    value="{{$parametros->par_codigo_bonos}}">
                                </div>                       
                        </div>
           
                        <div class="card" >
                            <h5 class="card-title">Deducciones</h5>
                            <div class="input mb-1">
                                <label  class="col-md-3 control-label">Salud:</label>
                                <input type="text" name="par_codigo_salud"  class="form_control col-md-1 derecha"
                                onclick="selConcepto('V1')"  id="V1"   maxlength="3" value="{{$parametros->par_codigo_salud}}">                         
           
                                <label  class="col-md-3 control-label derecha">Pensión:</label>
                                <input type="text" name="par_codigo_pension"  class="form_control col-md-1 derecha"
                                onclick="selConcepto('V2')"  id="V2"  maxlength="3"    value="{{$parametros->par_codigo_pension}}">
                            </div>
                            <div class="input mb-1">
                                <label  class="col-md-3 control-label">Riesgos:</label>
                                <input type="text" name="par_codigo_riesgos"  class="form_control col-md-1 derecha"
                                onclick="selConcepto('V3')"  id="V3"  maxlength="3" value="{{$parametros->par_codigo_riesgos}}">                         
                                <label  class="col-md-3 control-label">Retefuente:</label>
                                <input type="text" name="par_codigo_retefuente"  class="form_control col-md-1 derecha"
                                onclick="selConcepto('V4')"  id="V4"  maxlength="3" value="{{$parametros->par_codigo_retefuente}}">                         

                            </div>
                          
                    </div>
                    <div class="input mb-1">
                        <label class="col-md-2 control-label" name='selConcepto'>Concepto :</label>
                        <select name="idConcepto" id="idConcepto"  class="form_control col-md-5" "> 
                            <option value="">Seleccione un concepto</option>
                            @if(!empty($conceptos))
                                @foreach ($conceptos as $concepto)                               
                                    <option value="{{$concepto->cp_codigo}}">
                                        {{$concepto->cp_titulo}}   </option>
                                @endforeach
                            @endif         
                        </select>
                    </div>
                </div>
            </div> 
        </div>
        <div id="tab5" class="col-md-11 col-md-offset-1 alert alert-mm color-palette-set">
            <div class="card-body">        
                <div class="card-text">  
                    <span class="miSubTitulo">Retención en la Fuente</span>
                    <div class="input mb-1">
                        <label for="par_uvt" class="col-md-2 control-label">Valor UVT:</label>
                        <input type="text" name="par_uvt" id="par_uvt" class="form_control derecha"
                        required value="{{$parametros->par_uvt}}">

                    </div>

                    <div class="input mb-1">
                        <label  class="col-md-2 control-label">Rango 0:</label>
                        <input type="text" name="par_retefuente_rango0"  class="form_control col-md-1 derecha"
                        maxlength="5" value="{{$parametros->par_retefuente_rango0}}">                         
                         <input type="text"  class="form_control col-md-1 derecha"
                        readonly maxlength="5"   value="{{$parametros->par_retefuente_rango1}}">
                          <label  class="col-md-1 control-label derecha">Porcentaje :</label>
                          <input type="text" name="par_retefunte_porc0"  class="form_control col-md-1 derecha"
                          maxlength="6"    value="{{$parametros->par_retefunte_porc0}}">
                    </div>
                    <div class="input mb-1">
                        <label  class="col-md-2 control-label">Rango 1:</label>
                        <input type="text" name="par_retefuente_rango1"  class="form_control col-md-1 derecha"
                        maxlength="5" value="{{$parametros->par_retefuente_rango1}}">                         
                         <input type="text"  class="form_control col-md-1 derecha"
                         readonly  maxlength="5"   value="{{$parametros->par_retefuente_rango2}}">
                          <label  class="col-md-1 control-label derecha">Porcentaje :</label>
                          <input type="text" name="par_retefunte_porc1"  class="form_control col-md-1 derecha"
                          maxlength="6"    value="{{$parametros->par_retefunte_porc1}}">
                    </div>

                    <div class="input mb-1">
                        <label  class="col-md-2 control-label">Rango 2:</label>
                        <input type="text" name="par_retefuente_rango2"  class="form_control col-md-1 derecha"
                        maxlength="5" value="{{$parametros->par_retefuente_rango2}}">                         
                        <input type="text"  class="form_control col-md-1 derecha"
                        readonly  maxlength="5"   value="{{$parametros->par_retefuente_rango3}}">
                        <label  class="col-md-1 control-label derecha">Porcentaje :</label>
                        <input type="text" name="par_retefunte_porc2"  class="form_control col-md-1 derecha"
                        maxlength="6"    value="{{$parametros->par_retefunte_porc2}}">
                    </div>

                    <div class="input mb-1">
                        <label  class="col-md-2 control-label">Rango 3:</label>
                        <input type="text" name="par_retefuente_rango3"  class="form_control col-md-1 derecha"
                        maxlength="5" value="{{$parametros->par_retefuente_rango3}}">                         
                        <input type="text" class="form_control col-md-1 derecha"
                        readonly   maxlength="5"   value="{{$parametros->par_retefuente_rango4}}">
                        <label  class="col-md-1 control-label derecha">Porcentaje :</label>
                        <input type="text" name="par_retefunte_porc3"  class="form_control col-md-1 derecha"
                         maxlength="6"    value="{{$parametros->par_retefunte_porc3}}">
                    </div> 

                    <div class="input mb-1">
                        <label  class="col-md-2 control-label">Rango 4:</label>
                        <input type="text" name="par_retefuente_rango4"  class="form_control col-md-1 derecha"
                        maxlength="5" value="{{$parametros->par_retefuente_rango4}}">                         
                        <input type="text"  class="form_control col-md-1 derecha"
                        readonly maxlength="5"   value="{{$parametros->par_retefuente_rango5}}">
                        <label  class="col-md-1 control-label derecha">Porcentaje :</label>
                        <input type="text" name="par_retefunte_porc4"  class="form_control col-md-1 derecha"
                         maxlength="6"    value="{{$parametros->par_retefunte_porc4}}">
                    </div> 

                    <div class="input mb-1">
                        <label  class="col-md-2 control-label">Rango 5:</label>
                        <input type="text" name="par_retefuente_rango5"  class="form_control col-md-1 derecha"
                        maxlength="5" value="{{$parametros->par_retefuente_rango5}}">                         
                        <input type="text"  class="form_control col-md-1 derecha"
                        readonly maxlength="5"   value="{{$parametros->par_retefuente_rango6}}">
                        <label  class="col-md-1 control-label derecha">Porcentaje :</label>
                        <input type="text" name="par_retefunte_porc5"  class="form_control col-md-1 derecha"
                         maxlength="6"    value="{{$parametros->par_retefunte_porc5}}">
                    </div> 
                    <div class="input mb-1">
                        <label  class="col-md-2 control-label">Rango 6:</label>
                        <input type="text" name="par_retefuente_rango6"  class="form_control col-md-1 derecha"
                        maxlength="5" value="{{$parametros->par_retefuente_rango6}}">                         
                        <input type="text"   class="form_control col-md-1 derecha"
                        readonly maxlength="5"  value="999999">
                        <label  class="col-md-1 control-label derecha">Porcentaje :</label>
                        <input type="text" name="par_retefunte_porc6"  class="form_control col-md-1 derecha"
                         maxlength="6"    value="{{$parametros->par_retefunte_porc6}}">
                    </div> 
              
                </div>
            </div> 
        </div>
    @endforeach 
    <div class="mb-1">
        <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Menú</a>
    @if (auth()->user()->profile == 'A' || (auth()->user()->profile == 'S') )
        <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>  
    @endif
    
     {{-- par_fondoRiesgos ,  par_CajaSubsidio    @php echo number_format($item->acu_valor,2,",","."); @endphp  --}}
    </div> 
    <div style='display: none'>
        <input type="text" name="id" id="id" value="{{$parametros->id}}">
        <input type="text" id="cpto" value="">
        <input type="text" name="par_idEmpresa" id="par_idEmpresa" value="{{$parametros->par_idEmpresa}}">
    </div>
</div>

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

    function  selConcepto(op){       
        document.getElementById('cpto').value = op;
        document.getElementById(op).style.backgroundColor='#7af180';
    }

    $('#idConcepto').on('change',function(){
    var selectBox = document.getElementById('idConcepto');
    var nombre = selectBox.options[selectBox.selectedIndex].text;   
    var id = selectBox.options[selectBox.selectedIndex].value;
    var op = document.getElementById('cpto').value;
    document.getElementById(op).value = id;
    document.getElementById(op).style.backgroundColor='#FFF';
    })

    </script>
    
    <!-- >>>>>>>   Creado por: Alvaro Ortiz Castellanos   Monday,Nov 27, 2017 9:41:16   <<<<<<< -->
    
