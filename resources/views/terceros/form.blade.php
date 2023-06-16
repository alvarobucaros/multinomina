                <div class="input mb-1">
                    <label class="col-md-2 control-label" name='selConcepto'>Tipo :</label>
                    <select name="hex_idEmpleado" id="hex_idEmpleado"  class="form_control ">
                        <option value="0">Seleccione tipo tercero</option>
                        @if(!empty($terceros))
                            @foreach ($tipos as $item)  
                                <option value="{{$item->id}}">{{$item->tt_codigo  }}</option>
                            @endforeach
                        @endif                         
                    </select>
                </div>
                
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
                        <label for="ter_tipoDoc" class="col-md-2 control-label">Tipo Doc :</label>
                            <input type="radio" name="ter_tipoDoc" id="tipoC"
                            value="A"  @if ($terceros->ter_tipoDoc=='N') checked @endif> NIT
                            <input type="radio" name="ter_tipoDoc" id="tipoE" 
                            value="E"  @if ($terceros->ter_tipoDoc=='C') checked @endif> Cédula
                            <input type="radio" name="ter_tipoDoc" id="tipoN" 
                            value="N"  @if ($terceros->ter_tipoDoc=='T') checked @endif> Tarjeta Extranjero              
                    </div>
                    <div class="input mb-1">
                        <label for="ter_nroDoc" class="col-md-2 control-label">Nro Doc :</label>
                        <input type="text" name="ter_nroDoc" id="ter_nroDoc" class="form_control col-md-3"
                        required value="{{$terceros->ter_nroDoc}}">
                    </div>


{{-- 

                <div class="input mb-1">
                    <label for="ter_otrosFactores" class="col-md-2 control-label">Otros factores :</label>
                    <input type="radio" name="ter_otrosFactores" id="estadoA"
                    value="S" @if ($terceros->ter_otrosFactores=='S') checked @endif> Si
                    <input type="radio" name="ter_otrosFactores" id="estadoI" 
                    value="N" @if ($terceros->ter_otrosFactores=='N') checked @endif> No
                </div>  --}}


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

         