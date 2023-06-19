<div class="input mb-1">
    <label for="em_nombre" class="col-md-2 control-label">Nombre :</label>
    <input type="text" name="em_nombre" id="em_nombre" class="form_control col-md-6"
    required value="{{$empresas->em_nombre}}">
</div>
<div class="input mb-1">
    <label for="em_direccion" class="col-md-2 control-label">Direccion :</label>
    <input type="text" name="em_direccion" id="em_direccion" class="form_control col-md-6"
    value="{{$empresas->em_direccion}}">
</div>
 <div class="input mb-1">
    <label for="em_ciudad" class="col-md-2 control-label">Ciudad :</label>
    <input type="text" name="em_ciudad" id="em_ciudad" class="form_control col-md-6"
    value="{{$empresas->em_ciudad}}">
</div>
<div class="input mb-1">
    <label for="em_tipodoc" class="col-md-2 control-label">Tipo Doc :</label>
        <input type="radio" name="em_tipodoc" id="tipoC"
        value="A"  @if ($empresas->em_tipodoc=='C') checked @endif> C.Ciudadanía
        <input type="radio" name="em_tipodoc" id="tipoE" 
        value="E"  @if ($empresas->em_tipodoc=='E') checked @endif> C.Extranjería
        <input type="radio" name="em_tipodoc" id="tipoN" 
        value="N"  @if ($empresas->em_tipodoc=='N') checked @endif> Nit              
</div>
<div class="input mb-1">
    <label for="em_nrodoc" class="col-md-2 control-label">Nro Doc :</label>
    <input type="text" name="em_nrodoc" id="em_nrodoc" class="form_control"
    value="{{$empresas->em_nrodoc}}">
</div>
<div class="input mb-1">
    <label for="em_telefono" class="col-md-2 control-label">Celular :</label>
    <input type="text" name="em_telefono" id="em_telefono" class="form_control"
    value="{{$empresas->em_telefono}}">
</div>  

<div class="input mb-1">
    <label for="em_email" class="col-md-2 control-label">Email :</label>
    <input type="email" name="em_email" id="em_email" class="form_control col-md-6"
    required value="{{$empresas->em_email}}">
</div>     
  

<div class="input mb-1">
        <label for="em_fchini" class="col-md-2 control-label">Fecha Inicio :</label>
        <input type="date" name="em_fchini" id="em_fchini" class="form_control"
        required value="{{$empresas->em_fchini}}">
</div>  
<div class="input mb-1">
    <label for="em_fchfin" class="col-md-2 control-label">Fecha Final :</label>
    <input type="date" name="em_fchfin" id="em_fchfin" class="form_control "
    required value="{{$empresas->em_fchfin}}">
</div>             
<div class="input mb-1">
    <label for="em_observaciones" class="col-md-2 control-label">Observaciones :</label>
    <textarea name="em_observaciones" id="em_observaciones" cols="70" rows="2"                
    required value="{{$empresas->em_observaciones}}">{{$empresas->em_observaciones}}</textarea>
</div>   

<div class="input mb-1">
    <label for="em_estado" class="col-md-2 control-label">Estado :</label>
        <input type="radio" name="em_estado" id="estadoA"
        value="A" @if ($empresas->em_estado=='A') checked @endif> Activo
        <input type="radio" name="em_estado" id="estadoI" 
        value="I" @if ($empresas->em_estado=='I') checked @endif> Inactivo
     </div>
</div>

<div class="mb-1">
    <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Menú</a>
   @if (auth()->user()->profile == 'A') 
    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>  
   @endif
 
   
</div> 
<div style='display: none'>
    <input type="text" name="id" id="id" value="{{$empresas->id}}">
    <input type="text" name="em_autentica" id="em_autentica" value="{{$empresas->em_autentica}}">
    <input type="text" name="em_saldo" id="em_saldo" value="{{$empresas->em_saldo}}">
    <input type="text" name="em_us_clave" id="em_us_clave" value="{{$empresas->em_us_clave}}">
</div>



           
