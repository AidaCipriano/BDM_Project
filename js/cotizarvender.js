

const cotseleccion = document.getElementById("cotizar_vender_producto");
const seleccot = document.getElementById("seleccot");

function seleccion(){
      
    if(seleccot.value == "1" ){
        cotseleccion.value = 1;
    }  
    else if(seleccot.value == "2" ){
        cotseleccion.value = 2;
    } 
   
}


