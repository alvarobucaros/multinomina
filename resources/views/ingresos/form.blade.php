
                <div class="input mb-dep_nombre1">
                    <label for="dep_nombre" class="col-md-2 control-label">Nombre :</label>
                    <input type="text" name="dep_nombre" id="dep_nombre" class="form_control col-md-3"
                    required value="{{$dependencias->dep_nombre}}">
                </div>

                <div class="input mb-1">
                    <label for="dep_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="dep_estado" id="estadoA"
                    value="A" @if ($dependencias->dep_estado=='A') checked @endif> Activo
                    <input type="radio" name="dep_estado" id="estadoI" 
                    value="I" @if ($dependencias->dep_estado=='I') checked @endif> Inactivo
                 </div>
  
                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$dependencias->id}}">
                    <input type="text" name="dep_idEmpresa" id="dep_idEmpresa" value="{{$dependencias->dep_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('dependencias')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         