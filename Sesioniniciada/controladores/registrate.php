<?php

include("conexion.php");
//echo('coenxion exito');

if(isset($_POST['register'])){
    if(
        strlen($_POST['name'])     >= 1 &&
        strlen($_POST['apellido'])  >= 1 &&
        strlen($_POST['sexo'])     >= 1 &&
        strlen($_POST['nacimiento'])  >= 1 &&
        strlen($_POST['email'])     >= 1 &&
        strlen($_POST['username'])  >= 1 &&
        strlen($_POST['password'])     >= 1 &&
        strlen($_POST['tipo_usuario'])  >= 1 &&
        strlen($_POST['rol'])     >= 1 &&
        strlen($_POST['avatar'])  >= 1 
    ){
        $idsuario = null;
        $name = trim($_POST['name']);
        $apellido = trim($_POST['apellido']);
        $sexo = trim($_POST['sexo']);
        $nacimiento = trim($_POST['nacimiento']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $tipo_usuario = trim($_POST['tipo_usuario']);
        $rol = trim($_POST['rol']);
        $avatar = trim($_POST['avatar']);
        
        $consulta = "CALL sp_Usuarios('Registro', '$idsuario', '$name', '$apellido', '$sexo', '$nacimiento', '$email', '$username', '$password', '$tipo_usuario', '$rol', '$avatar');";
       // $consulta = "INSERT INTO usuario(id_usuario, email, nombreusuario, contrasena)
       //                 VALUES('$idsuario', '$email', '$username', '$password')";
        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_fetch_array($resultado);

        if($filas['Mensaje']=="Registrado"){
            echo '<script>  alert("Usuario registrado"); </script>';
            header("location:iniciosesion.php");
        }
        else if($filas['Mensaje']=='Cuenta existente'){    
            echo '<script>  alert("Cuenta existente. Intentelo de nuevo"); </script>';
            //header("location:registro.php");
        }
        else{
            echo('Error');
        }

    }
}
?>
