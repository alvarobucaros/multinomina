                <div class="input mb-1">
                    <label for="ban_codigo" class="col-md-2 control-label">Código :</label>
                    <input type="text" name="ban_codigo" id="ban_codigo" class="form_control col-md-6"
                    required value="{{$bancos->ban_codigo}}">
                </div>

                <div class="input mb-1">
                    <label for="ban_nombre" class="col-md-2 control-label">Nombre :</label>
                    <input type="text" name="ban_nombre" id="ban_nombre" class="form_control col-md-6"
                    required value="{{$bancos->ban_nombre}}">
                </div>
              

                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$bancos->id}}">
                    <input type="text" name="ban_idEmpresa" id="ban_idEmpresa" value="{{$bancos->ban_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('bancos')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         