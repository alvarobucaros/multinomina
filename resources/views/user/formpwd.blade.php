<div class="input mb-tt_codigo1">
    <label for="name" class="col-md-2 control-label">Usuario : </label> <span class="mayuscula">{{$user->name}}</span>
</div>
<hr>
<div class="input mb-1">
    <label for="passActual" class="col-md-2 control-label">Contraseña Actual :</label>
    <input type="password" name="passActual" id="passActual" class="form_control col-md-2" 
    maxlength="45" required >
</div>
<div class="input mb-1">
    <label for="passNuevo" class="col-md-2 control-label">Nueva Contraseña :</label>
    <input type="text" name="passNuevo" id="passNuevo" class="form_control col-md-2" 
    maxlength="45" required >
</div>
<div class="input mb-1">
    <label for="passNuevoRepite" class="col-md-2 control-label">Repite Contraseña :</label>
    <input type="text" name="passNuevoRepite" id="passNuevoRepite" class="form_control col-md-2" 
    maxlength="45" required>
</div>

<div class="mb-3">
    <a href="{{route('home.index')}}" class="btn btn-sm btn-info"> Regresa</a>
    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
</div> 