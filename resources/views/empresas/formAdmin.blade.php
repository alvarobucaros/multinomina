<hr size="4px" color="black"  />
<h5 class="card-header">Administrador:</h5>
<div class="input mb-1">
    <label for="em_us_nombre" class="col-md-2 control-label">Nombre  :</label>
    <input type="text" name="em_us_nombre" id="em_us_nombre" class="form_control col-md-6"
    required value="{{$empresas->em_us_nombre}}">
</div>  
<div class="input mb-1">
    <label for="em_us_telefono" class="col-md-2 control-label">Teléfono :</label>
    <input type="text" name="em_us_telefono" id="em_us_telefono" class="form_control"
    value="{{$empresas->em_us_telefono}}">
</div>  
<div class="input mb-1">
    <label for="em_us_email" class="col-md-2 control-label">Email :</label>
    <input type="email" name="em_us_email" id="em_us_email" class="form_control col-md-6"
    required value="{{$empresas->em_us_email}}">
</div>  

<div class="input mb-1">
    <label for="em_us_tipodoc" class="col-md-2 control-label">Tipo Doc :</label>
    @if ($empresas->em_us_tipodoc=='C')
        <input type="radio" name="em_us_tipodoc" id="tipouC"
        value="A" checked> C.Ciudadanía
        <input type="radio" name="em_us_tipodoc" id="tipouE" 
        value="E" > C.Extranjería
        <input type="radio" name="em_us_tipodoc" id="tipouN" 
        value="N" > C.Nit              
    @endif
    @if ($empresas->em_us_tipodoc=='E')
        <input type="radio" name="em_us_tipodoc" id="tipouC"
        value="A" > C.Ciudadanía
        <input type="radio" name="em_us_tipodoc" id="tipouE" 
        value="E" checked> C.Extranjería
        <input type="radio" name="em_us_tipodoc" id="tipouN" 
        value="N" > C.Nit              
    @endif
    @if ($empresas->em_us_tipodoc=='N')
        <input type="radio" name="em_us_tipodoc" id="tipouC"
        value="A" > C.Ciudadanía
        <input type="radio" name="em_us_tipodoc" id="tipouE" 
        value="E" > C.Extranjería
        <input type="radio" name="em_us_tipodoc" id="tipouN" 
        value="N" checked > C.Nit              
    @endif

</div>
<div class="input mb-1">
    <label for="em_us_nrodoc" class="col-md-2 control-label">Nro Doc :</label>
    <input type="text" name="em_us_nrodoc" id="em_us_nrodoc" class="form_control"
    value="{{$empresas->em_us_nrodoc}}">
</div>
<div class="input mb-1">
    <label for="em_us_telefono" class="col-md-2 control-label">Celular :</label>
    <input type="text" name="em_us_telefono" id="em_us_telefono" class="form_control"
    value="{{$empresas->em_us_telefono}}">
</div> 
<div class="input mb-1">
    <label for="em_us_codigo" class="col-md-2 control-label">Código :</label>
    <input type="text" name="em_us_codigo" id="em_us_codigo" class="form_control"
    value="{{$empresas->em_us_codigo}}">
</div>     


<hr size="4px" color="black"  />
