<div class="input mb-tt_codigo1">
    <label for="ing_idEmpleado" class="col-md-2 control-label">Empleado :</label>
    <select name="ing_idEmpleado" id="ing_idEmpleado" class="col-md-3 form_control">
        <option value="0">Seleccione empleado</option>
        @if(!empty($empleados))
            @foreach ($empleados as $empleado)                               
                <option value="{{$empleado->id}}" @selected($empleado->id == $ingresos->ing_idEmpleado)>
                    {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                    {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
            @endforeach
        @endif 
    </select>
</div>

<div class="input mb-tt_codigo1">
    <label for="ing_idCargo" class="col-md-2 control-label">Cargo :</label>
    <select name="ing_idCargo" id="ing_idCargo" class="col-md-3 form_control">
        <option value="0">Seleccione cargo</option>
        @if(!empty($cargos))
            @foreach ($cargos as $cargo)                               
                <option value="{{$cargo->id}}|{{$cargo->car_salario}}". @selected($cargo->id == $ingresos->ing_idCargo)>
                    {{$cargo->car_nombre}}  </option>
            @endforeach
        @endif 
    </select>
</div>

<div class="input mb-tt_codigo1">
    <label for="ing_idDependencia" class="col-md-2 control-label">Dependencia :</label>
    <select name="ing_idDependencia" id="ing_idDependencia" class="col-md-3 form_control">
        <option value="0">Seleccione dependencia</option>
        @if(!empty($dependencias))
            @foreach ($dependencias as $dependencia)                               
                <option value="{{$dependencia->id}}" @selected($dependencia->id == $ingresos->ing_idDependencia)>
                    {{$dependencia->dep_nombre}}  </option>
            @endforeach
        @endif 
    </select>
</div>

<div class="input mb-1">
    <label for="ing_salario" class="col-md-2 control-label">Salario Base:</label>
    <input type="text" name="ing_salario" id="ing_salario" class="form_control col-md-2 derecha" 
    maxlength="10"  value="{{$ingresos->ing_salario}}">
    <label for="ing_numeroContrato" class="col-md-2 control-label derecha">Nro Contrato:</label>
    <input type="text" name="ing_numeroContrato" id="ing_numeroContrato" class="form_control col-md-2" 
    maxlength="10" required value="{{$ingresos->ing_numeroContrato}}">
</div> 
<div class="input mb-1">
    <label for="ing_fechaIngreso" class="col-md-2 control-label">Fecha Ingreso:</label>
    <input type="date" name="ing_fechaIngreso" id="ing_fechaIngreso" class="form_control col-md-2" 
    maxlength="10" required value="{{$ingresos->ing_fechaIngreso}}">

    <label for="ing_fechaRetiro" class="col-md-2 control-label derecha">Fecha Retiro:</label>
    <input type="date" name="ing_fechaRetiro" id="ing_fechaRetiro" class="form_control col-md-2" 
    maxlength="10"  value="{{$ingresos->ing_fechaRetiro}}">
</div> 
<div class="input mb-tt_codigo1">
    <label for="ing_EPS" class="col-md-2 control-label">EPS :</label>
    <select name="ing_EPS" id="ing_EPS" class="col-md-3 form_control">
        <option value="0">Seleccione eps</option>
        @if(!empty($terceros))
            @foreach ($terceros as $tercero)  
            @if($tercero->ter_tipoTercero == 'E'))                             
                <option value="{{$tercero->id}}" @selected($tercero->id == $ingresos->ing_EPS)>
                    {{$tercero->ter_nombre}}  
                </option>
                @endif 
            @endforeach
        @endif 
    </select>
</div>
<div class="input mb-tt_codigo1">
    <label for="ing_AFP" class="col-md-2 control-label">Fondo de Pensión:</label>
    <select name="ing_AFP" id="ing_AFP" class="col-md-3 form_control">
        <option value="0">Seleccione AFP</option>
        @if(!empty($terceros))
            @foreach ($terceros as $tercero)  
            @if($tercero->ter_tipoTercero == 'P'))                             
                <option value="{{$tercero->id}}" @selected($tercero->id == $ingresos->ing_AFP)>
                    {{$tercero->ter_nombre}}  
                </option>
                @endif 
            @endforeach
        @endif 
    </select>
</div>

 <div class="input mb-tt_codigo1">
    <label for="ing_ARL" class="col-md-2 control-label">Adm Riesgo Laboral :</label>
    <select name="ing_ARL" id="ing_ARL" class="col-md-3 form_control">
        <option value="0">Seleccione ARL</option>
        @if(!empty($terceros))
            @foreach ($terceros as $tercero)  
            @if($tercero->ter_tipoTercero == 'R'))                             
                <option value="{{$tercero->id}}" @selected($tercero->id == $ingresos->ing_ARL)>
                    {{$tercero->ter_nombre}}  
                </option>
                @endif 
            @endforeach
        @endif 
    </select>
</div>

<div class="input mb-1">
    <label for="ing_porcRetefuente" class="col-md-2 control-label">Porcentaje Retefuente:</label>
    <input type="text" name="ing_porcRetefuente" id="ing_porcRetefuente" class="form_control col-md-1" 
    maxlength="6" required value="{{$ingresos->ing_porcRetefuente}}">
</div> 

<div class="input mb-1">
    <label for="ing_deduccionSalud" class="col-md-2 control-label">Deducción Salud:</label>
    <input type="text" name="ing_deduccionSalud" id="ing_deduccionSalud" class="form_control col-md-2 derecha" 
    maxlength="10"  value="{{$ingresos->ing_deduccionSalud}}">
    <label for="ing_deduccionDependiente" class="col-md-2 control-label derecha">Deduc.Persona a cargo:</label>
    <input type="text" name="ing_deduccionDependiente" id="ing_deduccionDependiente" class="form_control col-md-2 derecha" 
    maxlength="10" required value="{{$ingresos->ing_deduccionDependiente}}">
</div> 
<div class="input mb-1">
    <label for="ing_deduccionVivienda" class="col-md-2 control-label">Deducción Vicienda:</label>
    <input type="text" name="ing_deduccionVivienda" id="ing_deduccionVivienda" class="form_control col-md-2 derecha" 
    maxlength="10"  value="{{$ingresos->ing_deduccionVivienda}}">
    <label for="ing_deduccionAFC" class="col-md-2 control-label derecha">Deducción AFC:</label>
    <input type="text" name="ing_deduccionAFC" id="ing_deduccionAFC" class="form_control col-md-2 derecha" 
    maxlength="10" required value="{{$ingresos->ing_deduccionAFC}}">
</div> 
   

<div class="input mb-1">
    <label for="ing_porcARL" class="col-md-2 control-label">Porcentaje ARL:</label>
    <input type="text" name="ing_porcARL" id="ing_porcARL" class="form_control col-md-1" 
    maxlength="6" required value="{{$ingresos->ing_porcARL}}">
</div> 


<div class="input mb-tt_codigo1">
    <label for="ing_banco" class="col-md-2 control-label">Banco :</label>
    <select name="ing_banco" id="ing_banco" class="col-md-3 form_control">
        <option value="0">Seleccione banco</option>
        @if(!empty($bancos))
            @foreach ($bancos as $banco)                               
                <option value="{{$banco->id}}" @selected($banco->id == $ingresos->ing_banco)>
                    {{$banco->ban_nombre}}
                </option>
            @endforeach
        @endif 
    </select>
</div>

<div class="input mb-1">
    <label for="ing_cuenta" class="col-md-2 control-label">Nro Cuenta:</label>
    <input type="text" name="ing_cuenta" id="ing_cuenta" class="form_control col-md-2" 
    maxlength="10" required value="{{$ingresos->ing_cuenta}}">
    <label for="ing_tipoCtaBco" class="col-md-1 control-label derecha">Titpo :</label>
    <input type="radio" name="ing_tipoCtaBco" id="estadoA"
    value="A" @if ($ingresos->ing_tipoCtaBco=='A') checked @endif> Ahorros
    <input type="radio" name="ing_tipoCtaBco" id="estadoI" 
    value="C" @if ($ingresos->ing_tipoCtaBco=='C') checked @endif> Corriente
</div> 



<div class="input mb-1">
    <label for="ing_encargo" class="col-md-2 control-label">Encargado ? :</label>
    <input type="radio" name="ing_encargo" id="estadoA"
    value="S" @if ($ingresos->ing_encargo=='S') checked @endif> SI
    <input type="radio" name="ing_encargo" id="estadoI" 
    value="N" @if ($ingresos->ing_encargo=='N') checked @endif> NO

    <label for="ing_idCargoEncargo" class="col-md-2 control-label">Encargo :</label>
    <select name="ing_idCargoEncargo" id="ing_idCargoEncargo" class="col-md-3 form_control">
        <option value="0">Seleccione cargo</option>
        @if(!empty($cargos))
            @foreach ($cargos as $cargo)                               
                <option value="{{$cargo->id}}" @selected($cargo->id == $ingresos->ing_idCargoEncargo)>
                    {{$cargo->car_nombre}}  </option>
            @endforeach
        @endif 
    </select>
</div>


    <div class="input mb-1">
        <label for="ing_estado" class="col-md-2 control-label">Estado :</label>
        <input type="radio" name="ing_estado" id="estadoA"
        value="A" @if ($ingresos->ing_estado=='A') checked @endif> Activo
        <input type="radio" name="ing_estado" id="estadoI" 
        value="I" @if ($ingresos->ing_estado=='I') checked @endif> Inactivo
    </div>

    <div style='display: none'>
        <input type="text" name="id" id="id" value="{{$ingresos->id}}">
        <input type="text" name="ing_idEmpresa" id="ing_idEmpresa" value="{{$ingresos->ing_idEmpresa}}">
        <input type="date" name="ing_fchUltimaVacacion" id="ing_fchUltimaVacacion" value="{{$ingresos->ing_fchUltimaVacacion}}">
        <input type="date" name="ing_fchUltimaCesantia" id="ing_fchUltimaCesantia" value="{{$ingresos->ing_fchUltimaCesantia}}">  
    </div>

    <div class="mb-3">
        <a href="{{route('ingresos')}}" class="btn btn-sm btn-info"> Menú</a>
        <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
    </div> 

         