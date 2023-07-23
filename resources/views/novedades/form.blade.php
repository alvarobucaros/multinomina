                <div class="input mb-1">
                    <label class="col-md-2 control-label" name='selConcepto'>Empleado :</label>
                    <select name="nov_idEmpleado" id="nov_idEmpleado"  class="form_control col-md-4">
                        <option value="0">Seleccione un empleado</option>
                        @if(!empty($empleados))
                            @foreach ($empleados as $empleado)                               
                                <option value="{{$empleado->id}}" @selected($empleado->id == $novedades->nov_idEmpleado)>
                                    {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                                    {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
                            @endforeach
                        @endif         
                    </select>
                </div>

                <div class="input mb-1">
                    <label class="col-md-2 control-label" name='selConcepto'>Concepto :</label>
                    <select name="nov_idConcepto" id="nov_idConcepto"  class="form_control col-md-4">
                        <option value="0">Seleccione un concepto</option>
                        @if(!empty($conceptos))
                            @foreach ($conceptos as $concepto)                               
                                <option value="{{$concepto->id}}" @selected($concepto->id == $novedades->nov_idConcepto)>
                                    {{$concepto->cp_titulo}}   </option>
                            @endforeach
                        @endif         
                    </select>
                </div>
                <div class="input mb-1">
                    <label for="nov_tipo" class="col-md-2 control-label">Tipo :</label>
                    <input type="radio" name="nov_tipo" id="estadoA"
                    value="P" @if ($novedades->nov_tipo=='P') checked @endif> Permanente
                    <input type="radio" name="nov_tipo" id="estadoI" 
                    value="O" @if ($novedades->nov_tipo=='O') checked @endif> Ocasional
                 </div>

                <div class="input mb-1">
                    <label for="nov_periodo" class="col-md-2 control-label">Período :</label>
                    <input type="text" name="nov_periodo" id="nov_periodo" class="form_control col-md-2"
                    maxlength="6" value="{{$novedades->nov_periodo}}">
                </div>

                <div class="input mb-1">
                    <label for="nov_cantidad" class="col-md-2 control-label">Cantidad :</label>
                    <input type="text" name="nov_cantidad" id="nov_cantidad" class="form_control col-md-1"
                    maxlength="3" required value="{{$novedades->nov_cantidad}}">
                </div>

                <div class="input mb-1">
                        <label for="nov_valor" class="col-md-2 control-label">Valor  :</label>
                        <input type="text" name="nov_valor" id="nov_valor" 
                        class="form_control col-md-2" required value="{{$novedades->nov_valor}}">
                </div>
   

                <div class="input mb-1">
                    <label for="nov_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="nov_estado" id="estadoA"
                    value="A" @if ($novedades->nov_estado=='A') checked @endif> Activo
                    <input type="radio" name="nov_estado" id="estadoI" 
                    value="I" @if ($novedades->nov_estado=='I') checked @endif> Inactivo
                 </div>
               

                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$novedades->id}}">
                    <input type="text" name="nov_idEmpresa" id="nov_idEmpresa" value="{{$novedades->nov_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('novedades')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         