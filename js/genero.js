
const generoseleccion = document.getElementById("sexo");
const selectext = document.getElementById("selecsexo");


function seleccion(){
      
    if(selectext.value == "1" ){
        generoseleccion.value = 1;
    }  
    else if(selectext.value == "2" ){
        generoseleccion.value = 2;
    } 
    else if(selectext.value == "3" ){
        generoseleccion.value = 3;
    }  
}



