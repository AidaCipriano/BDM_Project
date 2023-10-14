
const email = document.getElementById("email");
const pass = document.getElementById("password");

const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

const btn = document.getElementById("btnlogin");

function btn_iniciarsesion()
{
    let regexPass = /^(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[0-9]){1})(?=(?:.*[?¿.#%=*,:;}{"'-]){1})\S{8,}/
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

    let entrar = false
    let warnings = ""
    parrafo.innerHTML = ""

    if(email.value ==="" || pass.value===""){
        //alert("Ambos son campos obligatorios");
        warnings += "Ambos son campos obligatorios <br>" 
        entrar = true
    }
    if(!regexEmail.test(email.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Formato Email incorrecto <br>"
        entrar = true
    }
    
    if(pass.value.length<8){
        //alert("La contraseña es muy corta");
        warnings += "La contraseña es muy corta  <br>"
        entrar = true
    }
    else if(!regexPass.test(pass.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial"
        entrar = true
    }

    if(entrar){
        parrafo.innerHTML = warnings
    }
    else{
        btn.click();
    }
} 





