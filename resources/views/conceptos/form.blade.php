                <div class="input mb-1" id='tipos'>
                    <label class="col-md-2 control-label" name='selConcepto'>Tipo :</label>
                    <select name="cp_tipo" id="cp_tipo"  class="form_control ">
                        <option value="">Seleccione un Tipo</option>
                        <option value="DV" @selected('DV' == $conceptos->cp_tipo)>Devengados</option>
                        <option value="DD" @selected('DD' == $conceptos->cp_tipo)>Deducible</option>
                        <option value="PE" @selected('PE' == $conceptos->cp_tipo)>Personalizado</option>
                     </select>                    
                </div>
                <div class="input mb-1">
                    <label for="cp_titulo" class="col-md-2 control-label">Titulo :</label>
                    <input type="text" name="cp_titulo" id="cp_titulo" class="form_control col-md-6"
                    maxlength="20" value="{{$conceptos->cp_titulo}}">
                </div>
                <div class="input mb-1">
                    <label for="cp_descripcion" class="col-md-2 control-label">Descripción :</label>
                    <textarea name="cp_descripcion" id="cp_descripcion" cols="50" rows="2"
                    class="form_control col-md-6" required value="{{$conceptos->cp_descripcion}}">{{$conceptos->cp_descripcion}}</textarea>
                </div>
                <div class="input mb-1">
                    <label for="cp_codigo" class="col-md-2 control-label">Código :</label>
                    <input type="text" name="cp_codigo" id="cp_codigo" class="form_control col-md-1"
                    maxlength="3" required value="{{$conceptos->cp_codigo}}">
                </div>
                <div class="input mb-1">
                    <label for="cp_fechaDesde" class="col-md-2 control-label">Fecha Desde :</label>
                    <input type="date" name="cp_fechaDesde" id="cp_fechaDesde"
                    class="form_control col-md-2" required value="{{$conceptos->cp_fechaDesde}}">
                </div>
                <div class="input mb-1">
                    <label for="cp_fechaHasta" class="col-md-2 control-label">Fecha Hasta :</label>
                    <input type="date" name="cp_fechaHasta" id="cp_fechaHasta"
                    class="form_control col-md-2" required value="{{$conceptos->cp_fechaHasta}}">
                </div>
                 <div class="input mb-1">
                    <label for="cp_valorDefault" class="col-md-2 control-label">Valor Defecto :</label>
                    <input type="text" name="cp_valorDefault" id="cp_valorDefault" 
                    class="form_control col-md-2" required value="{{$conceptos->cp_valorDefault}}">
                </div>
   
                <div class="input mb-1">
                    <label for="cp_porcentajeDefault" class="col-md-2 control-label">Porcentaje Defecto :</label>
                    <input type="text" name="cp_porcentajeDefault" id="cp_porcentajeDefault" 
                    class="form_control col-md-2" required value="{{$conceptos->cp_porcentajeDefault}}">
                </div>
                <div class="input mb-1">
                    <label for="cp_factorSalarial" class="col-md-2 control-label">Factor Salarial :</label>
                    <input type="radio" name="cp_factorSalarial" id="cp_factorSalarialS"
                    value="S" @if ($conceptos->cp_factorSalarial=='S') checked @endif> SI   
                    <input type="radio" name="cp_factorSalarial" id="cp_factorSalarialN" 
                    value="N" @if ($conceptos->cp_factorSalarial=='N') checked @endif> NO
                 </div>  
                 <div class="input mb-1">
                    <label for="cp_seguridadSocial" class="col-md-2 control-label">Seguridad Social :</label>
                    <input type="radio" name="cp_seguridadSocial" id="cp_seguridadSocialS"
                    value="S" @if ($conceptos->cp_seguridadSocial=='S') checked @endif> SI  
                    <input type="radio" name="cp_seguridadSocial" id="cp_seguridadSocialN" 
                    value="N" @if ($conceptos->cp_seguridadSocial=='N') checked @endif> NO
                 </div> 

                 <div class="input mb-1">
                    <label for="cp_ctaDebito" class="col-md-2 control-label">Cuenta Débito :</label>
                    <input type="text" name="cp_ctaDebito" id="cp_ctaDebito" class="form_control col-md-1"
                    maxlength="12" required value="{{$conceptos->cp_ctaDebito}}">
                </div>
                <div class="input mb-1">
                    <label for="cp_ctaCredito" class="col-md-2 control-label">Cuenta Crédito :</label>
                    <input type="text" name="cp_ctaCredito" id="cp_ctaCredito" class="form_control col-md-1"
                    maxlength="12" required value="{{$conceptos->cp_ctaCredito}}">
                </div>

                <div class="input mb-1">
                    <label for="cp_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="cp_estado" id="estadoA"
                    value="A" @if ($conceptos->cp_estado=='A') checked @endif> Activo
                    <input type="radio" name="cp_estado" id="estadoI" 
                    value="I" @if ($conceptos->cp_estado=='I') checked @endif> Inactivo
                 </div>
                
                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$conceptos->id}}">
                    <input type="text" name="cp_idEmpresa" id="cp_idEmpresa" value="{{$conceptos->cp_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('conceptos')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         