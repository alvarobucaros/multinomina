   
    $(document).ready(function(){
      
    });

    
 $('#tt_codigo').on('change',function(){
    var selectBox = document.getElementById('tt_codigo');
    var nombre = selectBox.options[selectBox.selectedIndex].text;
   
    var id = selectBox.options[selectBox.selectedIndex].value;
    if (id != ''){
        if (id != 'LD'){
            window.location.href = "/traeLiq/"+id+'|'+nombre;
        }else{
           document.getElementById('ppal').style.visibility = 'visible'; 
        }
    }
   
})               
