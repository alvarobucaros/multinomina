
                <div class="input mb-tt_codigo1">
                    <label for="name" class="col-md-2 control-label">Nombre :</label>
                    <input type="text" name="name" id="name" class="form_control col-md-3"
                    maxlength="10" required value="{{$user->name}}">
                </div>
                <div class="input mb-1">
                    <label for="username" class="col-md-2 control-label">Usuario :</label>
                    <input type="text" name="username" id="username" class="form_control col-md-6" 
                    maxlength="45" required value="{{$user->username}}">
                </div>
 
                <div class="input mb-1">
                    <label for="email" class="col-md-2 control-label">E mail :</label>
                    <input type="mail" name="email" id="email" class="form_control col-md-6" 
                    maxlength="45" required value="{{$user->email}}">
                </div>

<div class="input mb-1">
    <label for="direccion" class="col-md-2 control-label">direccion :</label>
    <input type="text" name="direccion" id="direccion" class="form_control col-md-6" 
    maxlength="45" required value="{{$user->direccion}}">
</div> 
<div class="input mb-1">
    <label for="ciudad" class="col-md-2 control-label">ciudad :</label>
    <input type="text" name="ciudad" id="ciudad" class="form_control col-md-6" 
    maxlength="45" required value="{{$user->ciudad}}">
</div> 
<div class="input mb-1">
    <label for="telefono" class="col-md-2 control-label">telefono :</label>
    <input type="text" name="telefono" id="telefono" class="form_control col-md-6" 
    maxlength="45" required value="{{$user->telefono}}">
</div> 

<div class="input mb-1">
    <label for="tipodoc" class="col-md-2 control-label">Tipo Doc :</label>
        <input type="radio" name="tipodoc" id="tipoC"
        value="A"  @if ($user->tipodoc=='N') checked @endif> NIT
        <input type="radio" name="tipodoc" id="tipoE" 
        value="E"  @if ($user->tipodoc=='C') checked @endif> Cédula
        <input type="radio" name="tipodoc" id="tipoN" 
        value="N"  @if ($user->tipodoc=='T') checked @endif> Tarjeta Extranjero              
</div>
<div class="input mb-1">
    <label for="nrodoc" class="col-md-2 control-label">Nro Doc :</label>
    <input type="text" name="nrodoc" id="nrodoc" class="form_control col-md-3"
    required value="{{$user->nrodoc}}">
</div>
<div class="input mb-1">
    <label for="profile" class="col-md-2 control-label">Perfil :</label>
    <input type="radio" name="profile" id="profileA"
    value="A" @if ($user->profile=='A') checked @endif> Administrador
    <input type="radio" name="profile" id="profileO"
    value="O" @if ($user->profile=='O') checked @endif> Operador
    <input type="radio" name="profile" id="profileI" 
    value="C" @if ($user->profile=='C') checked @endif> Consultas
    <input type="radio" name="profile" id="profileS" 
    value="S" @if ($user->profile=='S') checked @endif> Super ADM
 </div>                   

                <div class="input mb-1">
                    <label for="estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="estado" id="estadoA"
                    value="A" @if ($user->estado=='A') checked @endif> Activo
                    <input type="radio" name="estado" id="estadoI" 
                    value="I" @if ($user->estado=='I') checked @endif> Inactivo
                 </div>
  
                 <div style='display: none'>
                    <input type="text" name="barrio" id="barrio" value="{{$user->barrio}}">
                    <input type="text" name="codigo" id="codigo" value="{{$user->codigo}}"> 
                    <input type="text" name="password" id="password" value="{{$user->password}}">
                    <input type="text" name="id" id="id" value="{{$user->id}}">
                    <input type="text" name="empresa" id="empresa" value="{{$user->empresa}}">
                </div>
              
                <div class="mb-3">
                    <a href="{{route('user')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         