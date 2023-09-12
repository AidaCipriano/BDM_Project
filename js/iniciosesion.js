function validar(){
    var user, pass, expresion;

     user = document.getElementsByName("username").values;
     pass = document.getElementsByName("password").values;

    if(user ==="" || pass===""){
        alert("Ambos son campos obligatorios");
    }
    else if(user.length<3){
        alert("El nombre es muy corto");
        return false;
    }
    else if(pass.length<8){
        alert("La contraseña es muy corta");
        return false;
    }

}



