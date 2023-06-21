
                <div class="input mb-tt_codigo1">
                    <label for="emb_idEmpleado" class="col-md-2 control-label">Empleado :</label>
                    <select name="emb_idEmpleado" id="emb_idEmpleado" class="form_control">
                        <option value="0">Seleccione empleado</option>
                        @if(!empty($empleados))
                            @foreach ($empleados as $empleado)                               
                                <option value="{{$empleado->id}}" @selected($empleado->id == $embargos->emb_idEmpleado)>
                                    {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                                    {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
                            @endforeach
                        @endif 
                    </select>
                </div>
 
                <div class="input mb-tt_codigo1">
                    <label for="emb_idTercero" class="col-md-2 control-label">Tercero :</label>
                    <select name="emb_idTercero" id="emb_idTercero" class="form_control">
                        <option value="0">Seleccione tercero</option>
                        @if(!empty($terceros))
                            @foreach ($terceros as $tercero)                               
                                <option value="{{$tercero->id}}" @selected($tercero->id == $embargos->emb_idTercero)>
                                    {{$tercero->ter_nombre}}</option>
                            @endforeach
                        @endif 
                    </select>
                </div>

                <div class="input mb-1">
                    <label for="emb_valorCuota" class="col-md-2 control-label">Valor cuota:</label>
                    <input type="text" name="emb_valorCuota" id="emb_valorCuota" class="form_control col-md-2" 
                    maxlength="10" required 
                    value="{{$embargos->emb_valorCuota}}">
                </div>
                <div class="input mb-1">
                    <label for="emb_valorTotal" class="col-md-2 control-label">Valor total:</label>
                    <input type="text" name="emb_valorTotal" id="emb_valorTotal" class="form_control col-md-2" 
                    maxlength="10" required value="{{$embargos->emb_valorTotal}}">
                </div>     

                <div class="input mb-1">
                    <label for="emb_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="emb_estado" id="estadoA"
                    value="A" @if ($embargos->emb_estado=='A') checked @endif> Activo
                    <input type="radio" name="emb_estado" id="estadoI" 
                    value="I" @if ($embargos->emb_estado=='I') checked @endif> Inactivo
                 </div>
  
                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$embargos->id}}">
                    <input type="text" name="emb_idEmpresa" id="emb_idEmpresa" value="{{$embargos->emb_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('embargos')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

           