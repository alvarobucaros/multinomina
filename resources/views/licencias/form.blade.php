            <div class="input mb-tt_codigo1">
                <label for="lic_idEmpleado" class="col-md-2 control-label">Empleado :</label>
                <select name="lic_idEmpleado" id="lic_idEmpleado" class="form_control">
                    <option value="0">Seleccione empleado</option>
                    @if(!empty($licencias))
                    @foreach ($empleados as $empleado)                               
                    <option value="{{$empleado->id}}" @selected($empleado->id == $licencias->lic_idEmpleado)>
                        {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                        {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
                    @endforeach
                    @endif 
                </select>
            </div>

            <div class="input mb-1">
                <label for="lic_tipo" class="col-md-2 control-label">Tipo Licencia :</label>
                <select name="lic_tipo" id="lic_tipo"  class="form_control ">
                    <option value="">Seleccione tipo</option>
                    <option value="MT" @selected($licencias->lic_tipo == 'MT')>Maternidad, lactancia y aborto</option> 
                    <option value="PT" @selected($licencias->lic_tipo == 'PT')>Paternidad</option>
                    <option value="CO" @selected($licencias->lic_tipo == 'CO')>Desempeño de cargo oficial</option>
                    <option value="CD" @selected($licencias->lic_tipo == 'CD')>Calamidad Doméstica</option>  
                    <option value="LU" @selected($licencias->lic_tipo == 'LU')>Licencia de Luto</option> 
                    <option value="ES" @selected($licencias->lic_tipo == 'ES')>Licenia de Estudio</option>     
                    <option value="NO" @selected($licencias->lic_tipo == 'NO')>Licencia NO remunerada</option>                               
                </select>                 
            </div>
                <div class="input mb-lic_fechainicio1">
                    <label for="lic_fechainicio" class="col-md-2 control-label">Fecha Inicio :</label>
                    <input type="date" name="lic_fechainicio" id="lic_fechainicio" class="form_control col-md-2"
                    required value="{{$licencias->lic_fechainicio}}">
                </div>
                <div class="input mb-lic_fechainicio1">
                    <label for="lic_fechaFinal" class="col-md-2 control-label">Fecha Final :</label>
                    <input type="date" name="lic_fechaFinal" id="lic_fechaFinal" class="form_control col-md-2"
                    required value="{{$licencias->lic_fechaFinal}}">
                </div>
                <div class="input mb-1">
                    <label for="lic_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="lic_estado" id="estadoA"
                    value="A" @if ($licencias->lic_estado=='A') checked @endif> Activo
                    <input type="radio" name="lic_estado" id="estadoI" 
                    value="I" @if ($licencias->lic_estado=='I') checked @endif> Inactivo
                 </div>

                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$licencias->id}}">
                    <input type="text" name="lic_idEmpresa" id="lic_idEmpresa" value="{{$licencias->lic_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('licencias')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 


         