

                <div class="input mb-1">
                    <label class="col-md-2 control-label" name='selConcepto'>Tipo Cargo :</label>
                    <select name="car_tipo" id="car_tipo" class="form_control">
                        <option value="">Seleccione tipo cargo</option>                        
                        <option value="A" <?php if ($cargos->car_tipo == 'A') echo ' selected="selected"'; ?>>Auxiliar</option>
                        <option value="D" <?php if ($cargos->car_tipo == 'D') echo ' selected="selected"'; ?>>Directivo</option>                       
                        <option value="O" <?php if ($cargos->car_tipo == 'O') echo ' selected="selected"'; ?>>Operativo</option>
                        <option value="P" <?php if ($cargos->car_tipo == 'P') echo ' selected="selected"'; ?>Profecional</option>
                        <option value="T" <?php if ($cargos->car_tipo == 'T') echo ' selected="selected"'; ?>>Técnico tecnológico</option>
                    </select>
                </div>  

                <div class="input mb-1">
                    <label for="car_nombre" class="col-md-2 control-label">Nombre :</label>
                    <input type="text" name="car_nombre" id="car_nombre" class="form_control col-md-6"
                    required value="{{$cargos->car_nombre}}">
                </div>
              
                <div class="input mb-1">
                    <label for="car_salario" class="col-md-2 control-label">Salario :</label>
                    <input type="text" name="car_salario" id="car_salario" class="form_control col-md-6"
                    required value="{{$cargos->car_salario}}">
                </div>

                <div class="input mb-1">
                    <label for="car_nroOcupados" class="col-md-2 control-label">Cargos ocupados :</label>
                    <input type="text" name="car_nroOcupados" id="car_nroOcupados" class="form_control col-md-6"
                    required value="{{$cargos->car_nroOcupados}}">
                </div>
                <div class="input mb-1">
                    <label for="car_nroVacantes" class="col-md-2 control-label">Cargos vacantes :</label>
                    <input type="text" name="car_nroVacantes" id="car_nroVacantes"
                    class="form_control col-md-2" required value="{{$cargos->car_nroVacantes}}">
                </div>
 
                <div class="input mb-1">
                    <label for="car_otrosFactores" class="col-md-2 control-label">Otros factores :</label>
                    <input type="radio" name="car_otrosFactores" id="estadoA"
                    value="S" @if ($cargos->car_otrosFactores=='S') checked @endif> Si
                    <input type="radio" name="car_otrosFactores" id="estadoI" 
                    value="N" @if ($cargos->car_otrosFactores=='N') checked @endif> No
                </div> 


                <div class="input mb-1">
                    <label for="car_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="car_estado" id="estadoA"
                    value="A" @if ($cargos->car_estado=='A') checked @endif> Activo
                    <input type="radio" name="car_estado" id="estadoI" 
                    value="I" @if ($cargos->car_estado=='I') checked @endif> Inactivo
                 </div>

                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$cargos->id}}">
                    <input type="text" name="car_idEmpresa" id="car_idEmpresa" value="{{$cargos->car_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('cargos')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         