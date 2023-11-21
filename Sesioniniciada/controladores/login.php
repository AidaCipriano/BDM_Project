<?php

	//session_start();
	//error_reporting(0);
	
	/*if (isset($_SESSION['user_id'])) {
	header('location:../pantalladeljuego.php');
	}*/

	require 'conexion.php';
	//echo('coenxion exito');


	if(isset($_POST['login'])) {
	
	if(
        strlen($_POST['email'])     >= 1 &&
        strlen($_POST['password'])  >= 1 
    ){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $consulta = "CALL sp_Inicio_Sesion('$email', '$password')";
       // $consulta = "INSERT INTO usuario(id_usuario, email, nombreusuario, contrasena)
       //                 VALUES('$idsuario', '$email', '$username', '$password')";
        $resultado = mysqli_query($conexion, $consulta);
		$filas = mysqli_fetch_array($resultado);
        
		//Vendedor
		
		if($filas['Mensaje']=="Contraseña incorrecta"){
            echo '<script>  alert("Contraseña incorrecta"); </script>';
           // header("location:iniciosesion.php");
        }
		else if($filas['Mensaje']=="Email incorrecto"){
            echo '<script>  alert("Email incorrecto"); </script>';
           // header("location:iniciosesion.php");
        }
		else if($filas['rol']==1){
			$_SESSION['usuario'] = $filas['nombreusuario'];
			$ID['iduser'] = $filas['id_usuario'];
			$nombre['nombres'] = $filas['nombres'];
			$apellido['apellidos'] = $filas['apellidos'];
			header("location:Sesioniniciada/Vendedor/Home.php");
		}
		//Cliente
		else if($filas['rol']==2){
			if($filas['tipousuario'] == 1){
				$_SESSION['usuario'] = $filas['nombreusuario'];
				$_SESSION['iduser'] = $filas['id_usuario'];
				$_nombre['_nombres'] = $filas['nombres'];
				$_apellido['_apellidos'] = $filas['apellidos'];
				header("location: Sesioniniciada/Cliente/Publico/Home.php");
			}
		else if($filas['tipousuario'] == 2){
				$_SESSION['usuario'] = $filas['nombreusuario'];
				 $_SESSION['iduser'] = $filas['id_usuario'];
				$_nombre['_nombres'] = $filas['nombres'];
				$_apellido['_apellidos'] = $filas['apellidos'];
				header("location: Sesioniniciada/Cliente/Privado/Home.php");
			}


		}
		//Administradpr
		/*else if($filas['rol']==3){
			$_SESSION['usuario'] = $filas['nombreusuario'];
			header("location:../Administrador/Home.php");
		}*/
		/*
		else{
			?>
			<?php
				include("iniciosesion.php")
			?>
			<center>><h1>ERROR DE AUTENTIFICACION</h1></center>
			<?php

			<script src="js/iniciosesion.js"></script>
		}*/


    }

}

?>
