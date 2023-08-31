
                
                <div class="input mb-1">
                    <label for="ter_nombre" class="col-md-2 control-label">Nombre :</label>
                    <input type="text" name="ter_nombre" id="ter_nombre" class="form_control col-md-6"
                    required value="{{$terceros->ter_nombre}}">
                </div>
                <div class="input mb-1">
                    <label for="ter_direccion" class="col-md-2 control-label">Dirección :</label>
                    <input type="text" name="ter_direccion" id="ter_direccion" class="form_control col-md-6"
                    required value="{{$terceros->ter_direccion}}">
                </div>
                <div class="input mb-1">
                    <label for="ter_ciudad" class="col-md-2 control-label">Ciudad :</label>
                    <input type="text" name="ter_ciudad" id="ter_ciudad"
                    class="form_control col-md-2" required value="{{$terceros->ter_ciudad}}">
                </div>
                <div class="input mb-1">
                    <label for="ter_telefono" class="col-md-2 control-label">Telefono :</label>
                    <input type="text" name="ter_telefono" id="ter_telefono" class="form_control col-md-3"
                    required value="{{$terceros->ter_telefono}}">
                </div>
          
                <div class="input mb-1">
                    <label for="ter_email" class="col-md-2 control-label">Email :</label>
                    <input type="mail" name="ter_email" id="ter_email"
                    class="form_control col-md-2" required value="{{$terceros->ter_email}}">
                </div>

                <div class="input mb-1">
                    <label class="col-md-2 control-label" name='selConcepto'>Tipo Tercero:</label>
                    <select name="ter_tipoTercero" id="ter_tipoTercero"  class="form_control ">
                        <option value="">Seleccione tipo tercero</option>
                        <option value="C" <?php if ($terceros->ter_tipoTercero == 'C') echo ' selected="selected"'; ?>>Cooperativa</option>
                        <option value="E" <?php if ($terceros->ter_tipoTercero == 'E') echo ' selected="selected"'; ?>>EPS</option>
                        <option value="P" <?php if ($terceros->ter_tipoTercero == 'P') echo ' selected="selected"'; ?>>Adm Fondo Pensión</option>
                        <option value="R" <?php if ($terceros->ter_tipoTercero == 'R') echo ' selected="selected"'; ?>>Adm Riesgo Laboral</option>
                        <option value="F" <?php if ($terceros->ter_tipoTercero == 'F') echo ' selected="selected"'; ?>>Fondo empleado</option>
                        <option value="J" <?php if ($terceros->ter_tipoTercero == 'J') echo ' selected="selected"'; ?>>Juzgado</option>
                        <option value="O" <?php if ($terceros->ter_tipoTercero == 'O') echo ' selected="selected"'; ?>>Otro tercero</option>                      
                    </select>
                </div>

                    <div class="input mb-1">
                        <label for="ter_tipoDoc" class="col-md-2 control-label">Tipo Doc :</label>
                            <input type="radio" name="ter_tipoDoc" id="tipoC"
                            value="N"  @if ($terceros->ter_tipoDoc=='N') checked @endif> NIT
                            <input type="radio" name="ter_tipoDoc" id="tipoE" 
                            value="C"  @if ($terceros->ter_tipoDoc=='C') checked @endif> Cédula
                            <input type="radio" name="ter_tipoDoc" id="tipoN" 
                            value="T"  @if ($terceros->ter_tipoDoc=='T') checked @endif> Tarjeta Extranjero              
                    </div>
                    <div class="input mb-1">
                        <label for="ter_nroDoc" class="col-md-2 control-label">Nro Doc :</label>
                        <input type="text" name="ter_nroDoc" id="ter_nroDoc" class="form_control col-md-3"
                        required value="{{$terceros->ter_nroDoc}}">
                    </div>
                    <div class="input mb-1">
                        <label class="col-md-2 control-label" name='selConcepto'>Banco  :</label>
                        <select name="ter_idBanco" id="ter_idBanco"  class="form_control col-md-4">
                            <option value="0">Seleccione un banco</option>
                            @if(!empty($bancos))
                            @foreach ($bancos as $banco)                               
                                <option value="{{$banco->id}}" @selected($banco->id == $terceros->ter_idBanco)>
                                    {{$banco->ban_nombre}}</option>
                            @endforeach
                            @endif 
                            
                        </select>
                    </div>
                    <div class="input mb-1">
                        <label for="ter_ctaBanco" class="col-md-2 control-label">Nro Cuenta :</label>
                        <input type="text" name="ter_ctaBanco" id="ter_ctaBanco" class="form_control col-md-3"
                         value="{{$terceros->ter_ctaBanco}}">
                    </div>
                    <div class="input mb-1">
                        <label for="ter_tipoCtaBanco" class="col-md-2 control-label">Tpo cuenta :</label>
                        <input type="radio" name="ter_tipoCtaBanco" id="estadoA"
                        value="A" @if ($terceros->ter_tipoCtaBanco=='A') checked @endif> Ahorros
                        <input type="radio" name="ter_tipoCtaBanco" id="estadoI" 
                        value="C" @if ($terceros->ter_tipoCtaBanco=='C') checked @endif> Corriente
                     </div>


                <div class="input mb-1">
                    <label for="ter_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="ter_estado" id="estadoA"
                    value="A" @if ($terceros->ter_estado=='A') checked @endif> Activo
                    <input type="radio" name="ter_estado" id="estadoI" 
                    value="I" @if ($terceros->ter_estado=='I') checked @endif> Inactivo
                 </div>

                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$terceros->id}}">
                    <input type="text" name="ter_idEmpresa" id="ter_idEmpresa" value="{{$terceros->ter_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('terceros')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         