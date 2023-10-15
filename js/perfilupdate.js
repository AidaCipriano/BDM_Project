
const nombre1 = document.getElementById("name");
const apellido = document.getElementById("apellido");
const email = document.getElementById("email");
const user = document.getElementById("username");
const pass = document.getElementById("password");
const sex = document.getElementById("sexo");
const type_user = document.getElementById("tipo_usuario");
const rol = document.getElementById("rol");
const avatar = document.getElementById("avatar");

const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

const btn = document.getElementById("btn_update_Perfil");

function btn_updatePerfil()
{
    let regexPass = /^(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[0-9]){1})(?=(?:.*[?¿.#%=*,:;}{"'-]){1})\S{8,}/
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    let regexName = /^[ a-zA-ZÀ-ÿ]*$/

    let entrar = false
    let warnings = ""
    parrafo.innerHTML = ""

    if(!regexName.test(nombre1.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Solo se permiten letras <br>"
        entrar = true
    }

    if(!regexName.test(apellido.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Solo se permiten letras <br>"
        entrar = true
    }
/*
    if(!regexEmail.test(email.value)){
        //alert("La contraseña deeb tener 1 mayuscula, una miniscula, un numero y un caracter especial");
        warnings += "Formato Email incorrecto <br>"
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

*/
    if(entrar){
        parrafo.innerHTML = warnings
    }
    else{
        btn.click();
    }
} 





