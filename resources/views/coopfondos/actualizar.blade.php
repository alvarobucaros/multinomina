@extends('layouts/plantilla')

@section('tituloPagina', 'COOPERATIVAS Y FONDOS')

@section('contenido')

<div class="card row mt-2">
    <h5 class="card-header">Actualiza Cooperativas Fondos</h5>
    <div class="card-body">
        <div class="card-text">          
            <form action="{{ route('coopfondos/coopfondos.update', $coopfondos->id)}}" method="post">
                @csrf
                @include('coopfondos.form')
            </form>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')
<script>                    
    $(document).ready(function(){
  
    });
    $('#col_plazo').on('blur', function(e){
 
 var valor = e.target.value;
 var deuda = document.getElementById('cof_valorTotal').value;    
 if (valor > 0 ){
   document.getElementById('cof_valorCuota').value = deuda / valor;
 }else{
   document.getElementById('cof_valorCuota').value = 0;
 }
});
</script>
@endsection