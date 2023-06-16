

                <div class="input mb-1">
                    <label class="col-md-2 control-label" name='selConcepto'>Tipo Cargo :</label>
                    <select name="car_tipo" id="car_tipo" class="form_control">
                        <option value="0">Seleccione tipo cargo</option>
                        @if(!empty($tipos))
                            @foreach ($tipos as $tipo)                               
                                <option value="{{$tipo->id}}" @selected($tipo->id == $cargos->car_tipo)>
                                    {{$tipo->tt_descripcion}}</option>
                            @endforeach
                        @endif 
                    </select>
                </div>  

                <div class="input mb-1">
                    <label for="car_nombre" class="col-md-2 control-label">Nombre :</label>
                    <input type="text" name="car_nombre" id="car_nombre" class="form_control col-md-6"
                    required value="{{$cargos->car_nombre}}">
                </div>
              
                <div class="input mb-1">
                    <label for="car_salario" class="col-md-2 control-label">Salario :</label>
                    <input type="text" name="car_salario" id="car_salario" class="form_control col-md-6"
                    required value="{{$cargos->car_salario}}">
                </div>

                <div class="input mb-1">
                    <label for="car_nroOcupados" class="col-md-2 control-label">Cargos ocupados :</label>
                    <input type="text" name="car_nroOcupados" id="car_nroOcupados" class="form_control col-md-6"
                    required value="{{$cargos->car_nroOcupados}}">
                </div>
                <div class="input mb-1">
                    <label for="car_nroVacantes" class="col-md-2 control-label">Cargos vacantes :</label>
                    <input type="text" name="car_nroVacantes" id="car_nroVacantes"
                    class="form_control col-md-2" required value="{{$cargos->car_nroVacantes}}">
                </div>
 
                <div class="input mb-1">
                    <label for="car_otrosFactores" class="col-md-2 control-label">Otros factores :</label>
                    <input type="radio" name="car_otrosFactores" id="estadoA"
                    value="S" @if ($cargos->car_otrosFactores=='S') checked @endif> Si
                    <input type="radio" name="car_otrosFactores" id="estadoI" 
                    value="N" @if ($cargos->car_otrosFactores=='N') checked @endif> No
                </div> 


                <div class="input mb-1">
                    <label for="car_estado" class="col-md-2 control-label">Estado :</label>
                    <input type="radio" name="car_estado" id="estadoA"
                    value="A" @if ($cargos->car_estado=='A') checked @endif> Activo
                    <input type="radio" name="car_estado" id="estadoI" 
                    value="I" @if ($cargos->car_estado=='I') checked @endif> Inactivo
                 </div>

                 <div style='display: none'>
                    <input type="text" name="id" id="id" value="{{$cargos->id}}">
                    <input type="text" name="car_idEmpresa" id="car_idEmpresa" value="{{$cargos->car_idEmpresa}}">
                </div>
      
                <div class="mb-3">
                    <a href="{{route('cargos')}}" class="btn btn-sm btn-info"> Regresa</a>
                    <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
                </div> 

         