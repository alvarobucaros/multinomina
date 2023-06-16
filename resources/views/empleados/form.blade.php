<div class="input mb-1">
    <label for="empl_primerNombre" class="col-md-2 control-label">Primer nombre :</label>
    <input type="text" name="empl_primerNombre" id="empl_primerNombre" class="form_control col-md-4"
    required value="{{$empleados->empl_primerNombre}}">
</div>

<div class="input mb-1">
    <label for="empl_otroNombre" class="col-md-2 control-label">Otro nombre :</label>
    <input type="text" name="empl_otroNombre" id="empl_otroNombre" class="form_control col-md-4"
    required value="{{$empleados->empl_otroNombre}}">
</div>
<div class="input mb-1">
    <label for="empl_primerApellido" class="col-md-2 control-label">Primer apellido :</label>
    <input type="text" name="empl_primerApellido" id="empl_primerApellido" class="form_control col-md-4"
    required value="{{$empleados->empl_primerApellido}}">
</div>

<div class="input mb-1">
    <label for="empl_otroApellido" class="col-md-2 control-label">Otro apellido :</label>
    <input type="text" name="empl_otroApellido" id="empl_otroApellido" class="form_control col-md-4"
    required value="{{$empleados->empl_otroApellido}}">
</div>
<div class="input mb-1">
    <label for="empl_direccion" class="col-md-2 control-label">Dirección :</label>
    <input type="text" name="empl_direccion" id="empl_direccion" class="form_control col-md-6"
    required value="{{$empleados->empl_direccion}}">
</div>

<div class="input mb-1">
    <label for="empl_ciudad" class="col-md-2 control-label">Ciudad :</label>
    <input type="text" name="empl_ciudad" id="empl_ciudad" class="form_control col-md-3"
    required value="{{$empleados->empl_ciudad}}">
</div>
</div><div class="input mb-1">
    <label for="empl_telefono" class="col-md-2 control-label">Telefono :</label>
    <input type="text" name="empl_telefono" id="empl_telefono" class="form_control col-md-3"
    required value="{{$empleados->empl_telefono}}">
</div>
<div class="input mb-1">
    <label for="empl_tipodoc" class="col-md-2 control-label">Tipo Doc :</label>
        <input type="radio" name="empl_tipodoc" id="tipoC"
        value="A"  @if ($empleados->empl_tipodoc=='C') checked @endif> C.Ciudadanía
        <input type="radio" name="empl_tipodoc" id="tipoE" 
        value="E"  @if ($empleados->empl_tipodoc=='E') checked @endif> C.Extranjería
        <input type="radio" name="empl_tipodoc" id="tipoN" 
        value="N"  @if ($empleados->empl_tipodoc=='T') checked @endif> Tarjeta Extranjero              
</div>
<div class="input mb-1">
    <label for="empl_nrodoc" class="col-md-2 control-label">Nro Doc :</label>
    <input type="text" name="empl_nrodoc" id="empl_nrodoc" class="form_control col-md-3"
    required value="{{$empleados->empl_nrodoc}}">
</div>

<div class="input mb-1">
    <label for="empl_codigo" class="col-md-2 control-label">Codigo :</label>
    <input type="text" name="empl_codigo" id="empl_codigo" class="form_control col-md-2"
    required value="{{$empleados->empl_codigo}}">
</div>
<div class="input mb-1">
    <label for="empl_email" class="col-md-2 control-label">Email :</label>
    <input type="email" name="empl_email" id="empl_email" class="form_control col-md-4"
    required value="{{$empleados->empl_email}}">
</div>
<div class="input mb-1">
    <label for="empl_fechaIngreso" class="col-md-2 control-label">Fecha Ingreso :</label>
    <input type="date" name="empl_fechaIngreso" id="empl_fechaIngreso" class="form_control col-md-2"
    required value="{{$empleados->empl_fechaIngreso}}">
</div>
<div class="input mb-1">
    <label for="empl_fechaRetiro" class="col-md-2 control-label">Fecha Retiro :</label>
    <input type="date" name="empl_fechaRetiro" id="empl_fechaRetiro" class="form_control col-md-2"
    required value="{{$empleados->empl_fechaRetiro}}">
</div>
<div class="input mb-1">
    <label for="empl_estado" class="col-md-2 control-label">Estado :</label>
    <input type="radio" name="empl_estado" id="estadoA"
    value="A" @if ($empleados->empl_estado=='A') checked @endif> Activo
    <input type="radio" name="empl_estado" id="estadoI" 
    value="I" @if ($empleados->empl_estado=='I') checked @endif> Inactivo
 </div>


<div style='display: none'>
    <input type="text" name="id" id="id" value="{{$empleados->id}}">
    <input type="text" name="empl_idEmpresa" id="empl_idEmpresa" value="{{$empleados->empl_idEmpresa}}">
</div>

<div class="mb-3">
    <a href="{{route('empleados')}}" class="btn btn-sm btn-info"> Regresa</a>
    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
</div> 