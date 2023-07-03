
                <div class="input ">
                    <label for="dias_diasHabiles" class="col-md-2 control-label">diasHabiles :</label>
                    <input type="date" name="dias_diasHabiles" id="dias_diasHabiles" class="form_control col-md-2"
                    required value="{{$diasHabiles->dias_diasHabiles}}">
                </div>

                <div class="input mb-1">
                    <label for="dias_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="dias_estado" id="estadoA"
                    value="H" @if ($diasHabiles->dias_estado=='H') checked @endif> Habil
                    <input type="radio" name="dias_estado" id="estadoI" 
                    value="N" @if ($diasHabiles->dias_estado=='N') checked @endif> No Habil
                 </div>
  
                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$diasHabiles->id}}">
                    <input type="text" name="dias_idEmpresa" id="dias_idEmpresa" value="{{$diasHabiles->dias_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('diasHabiles')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         