
const nombrecat = document.getElementById("nombre_categoria");
const descripcioncat = document.getElementById("descripcioncat");

const formcat = document.getElementById("form_categoria");
const parrafo = document.getElementById("warnings");

const btn = document.getElementById("btn_guardar_categoria");

function btn_guardarCategoria()
{

    let regexName = /^[ a-zA-ZÀ-ÿ]*$/

    let entrar = false
    let warnings = ""
    parrafo.innerHTML = ""



    if(!regexName.test(nombrecat.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Solo se permiten letras <br>"
        entrar = true
    }

    if(!regexName.test(descripcioncat.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Solo se permiten letras <br>"
        entrar = true
    }

    


        
    

    if(entrar == true){
        parrafo.innerHTML = warnings
    }
    else{
        btn.click();
    }
} 





