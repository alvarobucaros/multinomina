                <div class="input mb-1" id='tipos'>
                    <label class="col-md-2 control-label" name='selConcepto'>Tipo :</label>
                    <select name="cp_tipo" id="cp_tipo"  class="form_control ">
                        <option value="">Seleccione un Tipo</option>
                        <option value="I" @selected('I' == $conceptos->cp_tipo)>Devengados</option>
                        <option value="D" @selected('D' == $conceptos->cp_tipo)>Deducible</option>
                        <option value="A" @selected('A' == $conceptos->cp_tipo)>Auxiliar</option>
                    </select>
                    
                </div>
                <div class="input mb-1">
                    <label for="cp_titulo" class="col-md-2 control-label">Titulo :</label>
                    <input type="text" name="cp_titulo" id="cp_titulo" class="form_control col-md-6"
                    required value="{{$conceptos->cp_titulo}}">
                </div>
                <div class="input mb-1">
                    <label for="cp_descripcion" class="col-md-2 control-label">Descripción :</label>
                    <textarea name="cp_descripcion" id="cp_descripcion" cols="50" rows="2"
                    class="form_control col-md-6" required value="{{$conceptos->cp_descripcion}}">{{$conceptos->cp_descripcion}}</textarea>
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
                    <label for="cp_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="cp_estado" id="estadoA"
                    value="A" @if ($conceptos->cp_estado=='A') checked @endif> Activo
                    <input type="radio" name="cp_estado" id="estadoI" 
                    value="I" @if ($conceptos->cp_estado=='I') checked @endif> Inactivo
                 </div>
                 <div class="input mb-1">
                    <label for="cp_clase" class="col-md-2 control-label">Clase :</label>
                    <input type="radio" name="cp_clase" id="estadoA"
                    value="U" @if ($conceptos->cp_clase=='U') checked @endif> De Usuario
                    <input type="radio" name="cp_clase" id="estadoI" 
                    value="F" @if ($conceptos->cp_clase=='F') checked @endif> Fijo
                 </div>                 

                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$conceptos->id}}">
                    <input type="text" name="cp_idEmpresa" id="cp_idEmpresa" value="{{$conceptos->cp_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('conceptos')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         