
        <div class="input mb-1">
            <label class="col-md-2 control-label" name='selConcepto'>Empleado :</label>
            <select name="hex_idEmpleado" id="hex_idEmpleado"  class="form_control ">
                <option value="0">Seleccione un empleado</option>
                @if(!empty($empleados))
                @foreach ($empleados as $empleado)                               
                    <option value="{{$empleado->id}}" @selected($empleado->id == $HorasExtras->hex_idEmpleado)>
                        {{$empleado->empl_primerApellido}}    {{$empleado->empl_otroApellido}}                                  
                        {{$empleado->empl_primerNombre}}    {{$empleado->empl_otroNombre}}</option>
                @endforeach

                @endif 
                
            </select>
        </div>
        <div class="input mb-dep_nombre1">
            <label for="hex_periodo" class="col-md-1 control-label">Periodo :</label>
            <input type="text" name="hex_periodo" id="hex_periodo" class="form_control col-md-3"
            required value="{{$HorasExtras->hex_periodo}}">
        </div>
        <div class="input mb-dep_nombre1">
            <label for="hex_diurnas" class="col-md-1 control-label">Diurnas :</label>
            <input type="text" name="hex_diurnas" id="hex_diurnas" class="form_control col-md-3"
            required value="{{$HorasExtras->hex_diurnas}}">
        </div>
        <div class="input mb-dep_nombre1">
            <label for="hex_nocturnas" class="col-md-1 control-label">Nocturnes :</label>
            <input type="text" name="hex_nocturnas" id="hex_nocturnas" class="form_control col-md-3"
            required value="{{$HorasExtras->hex_nocturnas}}">
        </div>

        <div class="input mb-dep_nombre1">
            <label for="hex_festivasDiurna" class="col-md-1 control-label">Diurnas Festivos :</label>
            <input type="text" name="hex_festivasDiurna" id="hex_festivasDiurna" class="form_control col-md-3"
            required value="{{$HorasExtras->hex_festivasDiurna}}">
        </div>
        <div class="input mb-dep_nombre1">
            <label for="hex_festivasNocturna" class="col-md-1 control-label">Nocturnas Festivos :</label>
            <input type="text" name="hex_festivasNocturna" id="hex_festivasNocturna" class="form_control col-md-3"
            required value="{{$HorasExtras->hex_festivasNocturna}}">
        </div>               

        <div style='display: none'>
            <input type="text" name="id" id="id" value="{{$HorasExtras->id}}">
            <input type="text" name="hex_idEmpresa" id="hex_idEmpresa" value="{{$HorasExtras->hex_idEmpresa}}">
        </div>

        <div class="mb-3">
            <a href="{{route('horas_extras')}}" class="btn btn-sm btn-info"> Regresa</a>
            <button type="submit" class="btn btn-sm btn-primary"> Acepta</button>
        </div>  

         