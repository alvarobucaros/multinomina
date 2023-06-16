                <div class="input mb-1">
                    <label for="tt_clase" class="col-md-2 control-label">Clase :</label>
                    <select name="tt_clase" id="tt_clase"  class="form_control ">
                        <option value="">Seleccione tipo tercero</option>
                        <option value="AR" @selected($tiposvarios->tt_clase == 'AR')>ARL</option> 
                        <option value="CA" @selected($tiposvarios->tt_clase == 'CA')>Cargos</option>
                        <option value="CC" @selected($tiposvarios->tt_clase == 'CC')>Caja de Compensación</option>
                        <option value="CO" @selected($tiposvarios->tt_clase == 'CO')>Cooperativas(fondos)</option>  
                        <option value="EP" @selected($tiposvarios->tt_clase == 'EP')>EPS</option> 
                        <option value="FP" @selected($tiposvarios->tt_clase == 'FP')>Fondos Pensión</option> 
                        <option value="JZ" @selected($tiposvarios->tt_clase == 'JZ')>Juzgados</option>     
                        <option value="OT" @selected($tiposvarios->tt_clase == 'OT')>Otros</option> 
                        @selected($tiposvarios->tt_clase == 'AR')              
                    </select>                    
   
                </div>
                <div class="input mb-tt_codigo1">
                    <label for="tt_codigo" class="col-md-2 control-label">Código :</label>
                    <input type="text" name="tt_codigo" id="tt_codigo" class="form_control col-md-3"
                    maxlength="10" required value="{{$tiposvarios->tt_codigo}}">
                </div>
                <div class="input mb-1">
                    <label for="tt_descripcion" class="col-md-2 control-label">Descripción :</label>
                    <input type="text" name="tt_descripcion" id="tt_descripcion" class="form_control col-md-6" 
                    maxlength="45" required value="{{$tiposvarios->tt_descripcion}}">
                </div>
      

                <div class="input mb-1">
                    <label for="tt_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="tt_estado" id="estadoA"
                    value="A" @if ($tiposvarios->tt_estado=='A') checked @endif> Activo
                    <input type="radio" name="tt_estado" id="estadoI" 
                    value="I" @if ($tiposvarios->tt_estado=='I') checked @endif> Inactivo
                 </div>
  
                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$tiposvarios->id}}">
                    <input type="text" name="cp_idEmpresa" id="cp_idEmpresa" value="{{$tiposvarios->cp_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('tiposvarios')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         