<?php

include("conexion.php");
//echo('coenxion exito');

$response = array();

if(isset($_POST['register'])){

    if(isset($_FILES['imagen']) && !empty($_FILES['imagen']['name'])){

    if(
        strlen($_POST['name'])     >= 1 &&
        strlen($_POST['apellido'])  >= 1 &&
        strlen($_POST['sexo'])     >= 1 &&
        strlen($_POST['nacimiento'])  >= 1 &&
        strlen($_POST['email'])     >= 1 &&
        strlen($_POST['username'])  >= 1 &&
        strlen($_POST['password'])     >= 1 &&
        strlen($_POST['tipo_usuario'])  >= 1 &&
        strlen($_POST['rol'])     >= 1
    )
    { 
        if ($_FILES['imagen']['size'] > 0) {
            if(trim($_POST['rol']) == 1){
                $directorio_destino = "Sesioniniciada/Vendedor/images/";
            }
            else if(trim($_POST['rol'])== 2){
                $directorio_destino = "Sesioniniciada/Cliente/images/";
            }
        
        
       
        // Directorio donde se guardarán las imágenes (ajustar según tu configuración)

        // Obtener información de la imagen
        $imagen_nombre = $_FILES['imagen']['name'];
        $imagen_temp = $_FILES['imagen']['tmp_name'];

        // Mover la imagen al directorio de destino
        move_uploaded_file($imagen_temp, $directorio_destino . $imagen_nombre);

        // Guardar la ruta de la imagen en la variable $imagen_path
        if(trim($_POST['rol']) == 1){
            $directorio_destino = "images/";
        }
        else if(trim($_POST['rol'])== 2){
            $directorio_destino = "../images/";
        }



        $imagen_path = $directorio_destino . $imagen_nombre;
    }

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
      
        
        $consulta = "CALL sp_Usuarios('Registro', '$idsuario', '$name', '$apellido', '$sexo', '$nacimiento', '$email', '$username', '$password', '$tipo_usuario', '$rol', '$imagen_path');";
       // $consulta = "INSERT INTO usuario(id_usuario, email, nombreusuario, contrasena)
       //                 VALUES('$idsuario', '$email', '$username', '$password')";
        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_fetch_array($resultado);

        if($filas['Mensaje']=="Registrado"){

            // Mover la imagen al directorio "imagenes"
           // $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            // Usar el nombre original de la imagen
           // $nombreImagen = $nombreArchivo;
          //  $rutaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/Imagenes/';
          //  $rutaCompleta = $rutaImagenes . $nombreImagen;
         //   move_uploaded_file($_FILES['foto']['tmp_name'], $rutaCompleta);


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

    }else {
        echo 'Por favor, seleccione una imagen.';
    }
}
?>
