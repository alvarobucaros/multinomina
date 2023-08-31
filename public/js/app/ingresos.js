$('#ing_idCargo').on('change',function(){
    var selectBox = document.getElementById('ing_idCargo');
  
    var id = selectBox.options[selectBox.selectedIndex].value;
    if (id != ''){
        var ar = id.split("|");
           document.getElementById('ing_salario').value = ar[1]; 
        }
    
   
})               
