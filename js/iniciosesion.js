
const user = document.getElementById("username");
const pass = document.getElementById("password");

const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

form.addEventListener("submit", e=>{
    e.preventDefault()
    let regexPass = /^(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[0-9]){1})(?=(?:.*[?¿.#%=*,:;}{"'-]){1})\S{8,}/
    let entrar = false
    let warnings = ""
    parrafo.innerHTML = ""

    if(user.value ==="" || pass.value===""){
        //alert("Ambos son campos obligatorios");
        warnings += "Ambos son campos obligatorios <br>" 
        entrar = true
    }
    if(user.value.length<3){
        //alert("El nombre es muy corto");
        warnings += "El nombre es muy corto  <br>"
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
        parrafo.innerHTML = "Enviado"
    }
} )





