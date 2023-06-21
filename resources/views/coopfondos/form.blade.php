
<div class="input mb-tt_codigo1">
    <label for="cof_idEmpleado" class="col-md-2 control-label">Empleado :</label>
    <select name="cof_idEmpleado" id="cof_idEmpleado" class="form_control">
        <option value="0">Seleccione empleado</option>
        @if(!empty($empleados))
            @foreach ($empleados as $empleado)                               
                <option value="{{$empleado->id}}" @selected($empleado->id == $coopfondos->cof_idEmpleado)>
                    {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                    {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
            @endforeach
        @endif 
    </select>
</div>

<div class="input mb-tt_codigo1">
    <label for="cof_idTercero" class="col-md-2 control-label">Tercero :</label>   
    <select name="cof_idTercero" id="cof_idTercero" class="form_control">
        <option value="0">Seleccione tercero</option>
        @if(!empty($terceros))
            @foreach ($terceros as $tercero)                               
                <option value="{{$tercero->id}}" @selected($tercero->id == $coopfondos->cof_idTercero)>
                    {{$tercero->ter_nombre}}</option>
            @endforeach
        @endif 
    </select>
</div>

<div class="input mb-1">
    <label for="cof_valorTotal" class="col-md-2 control-label">Valor Total:</label>
    <input type="text" name="cof_valorTotal" id="cof_valorTotal" class="form_control col-md-2" 
    maxlength="10" required 
    value="{{$coopfondos->cof_valorTotal}}">
</div>
<div class="input mb-1">
    <label for="col_plazo" class="col-md-2 control-label">Plazo:</label>
    <input type="text" name="col_plazo" id="col_plazo" class="form_control col-md-2" 
    maxlength="10" required value="{{$coopfondos->col_plazo}}">
</div> 
<div class="input mb-1">
    <label for="cof_valorCuota" class="col-md-2 control-label">Valor Cuota:</label>
    <input type="text" name="cof_valorCuota" id="cof_valorCuota" class="form_control col-md-2" 
    maxlength="10" required value="{{$coopfondos->cof_valorCuota}}">
</div>     


<div class="input mb-1">
    <label for="cof_saldo" class="col-md-2 control-label">Saldo:</label>
    <input type="text" name="cof_saldo" id="cof_saldo" class="form_control col-md-2" 
    maxlength="10" required value="{{$coopfondos->cof_saldo}}">
</div> 
<div class="input mb-1">
    <label for="cof_fechaInicio" class="col-md-2 control-label">Fecha Inicial:</label>
    <input type="date" name="cof_fechaInicio" id="cof_fechaInicio" class="form_control col-md-2" 
    maxlength="10" required value="{{$coopfondos->cof_fechaInicio}}">
</div> 
<div class="input mb-1">
    <label for="cof_fechaFinal" class="col-md-2 control-label">Fecha Final:</label>
    <input type="date" name="cof_fechaFinal" id="cof_fechaFinal" class="form_control col-md-2" 
    maxlength="10" required value="{{$coopfondos->cof_fechaFinal}}">
</div> 

<div class="input mb-1">
    <label for="cof_periDescuento" class="col-md-2 control-label">Descuento :</label>
    <input type="radio" name="cof_periDescuento" id="estadoA"
    value="P" @if ($coopfondos->cof_periDescuento=='P') checked @endif> Periódico
    <input type="radio" name="cof_periDescuento" id="estadoI" 
    value="S" @if ($coopfondos->cof_periDescuento=='S') checked @endif> Semestral
 </div>

 <div style='display: none'>
    <input type="text" name="id" id="id" value="{{$coopfondos->id}}">
    <input type="text" name="cof_idEmpresa" id="cof_idEmpresa" value="{{$coopfondos->cof_idEmpresa}}">
</div>

<div class="mb-3">
    <a href="{{route('coopfondos')}}" class="btn btn-sm btn-info"> Regresa</a>
    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
</div> 

