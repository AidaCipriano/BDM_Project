
const nombre_producto = document.getElementById("nombre_producto");
const descripcion_producto = document.getElementById("descripcion_producto");
const precio_producto = document.getElementById("precio_producto");
const cantidaddisponible = document.getElementById("cantidaddisponible");

const form_producto = document.getElementById("form_producto");
const parrafo = document.getElementById("warnings");

const btn = document.getElementById("btn_guardar_producto");

function btn_guardarProducto()
{

    let regexName = /^[ a-zA-ZÀ-ÿ]*$/
    let regexnumbers = /^[0-9]+(\.[0-9]+)?$/

    let entrar = false
    let warnings = ""
    parrafo.innerHTML = ""


    if(nombre_producto.value ==="" ){
        //alert("Ambos son campos obligatorios");
        warnings += "Nombre es campo obligatorio <br>" 
        entrar = true
    }
    else if(!regexName.test(nombre_producto.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Nombre solo se permiten letras <br>"
        entrar = true
    }
    if(descripcion_producto.value ==="" ){
        //alert("Ambos son campos obligatorios");
        warnings += "Descripcion es campo obligatorio <br>" 
        entrar = true
    }
    else  if(!regexName.test(descripcion_producto.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Descripcion solo se permiten letras <br>"
        entrar = true
    }
    if(precio_producto.value===""){
        //alert("Ambos son campos obligatorios");
        warnings += "Precio es campo obligatorio <br>" 

        entrar = true
    }
    else if(!regexnumbers.test(precio_producto.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Precio solo se permiten numeros <br>"
        entrar = true
    }
    if(cantidaddisponible.value===""){
        //alert("Ambos son campos obligatorios");
        warnings += "Cantidad Disponible es campo obligatorio <br>" 

        entrar = true
    }
    else if(!regexnumbers.test(cantidaddisponible.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Cantidad Disponible solo se permiten numeros <br>"
        entrar = true
    }


    if(entrar == true){
        parrafo.innerHTML = warnings
    }
    else{
        btn.click();
    }
} 





