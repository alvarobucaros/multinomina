                  
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
