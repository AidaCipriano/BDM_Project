<?php

	//session_start();
	//error_reporting(0);
	
	/*if (isset($_SESSION['user_id'])) {
	header('location:../pantalladeljuego.php');
	}*/

	require 'conexion.php';
	//echo('coenxion exito');
	

	//$user = $_SESSION['usuario'];


if(isset($_POST['ActPerfil'])){
    if(
        strlen($_POST['usuario_id']) 
    ){
        $id = trim($_POST['usuario_id']);
        $name = trim($_POST['name']);
        $apellido = trim($_POST['apellido']);
        $sexo = trim($_POST['sexo']);
        $nacimiento = $_POST['nacimiento'];
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $tipo_usuario = null;
        $rol = null;
        $avatar = trim($_POST['avatar']);
        
        $consulta = "CALL sp_Usuarios('Actualizar', '$id', '$name', '$apellido', '$sexo', '$nacimiento', '$email', '$username', '$password', '$tipo_usuario', '$rol', '$avatar');";
       // $consulta = "INSERT INTO usuario(id_usuario, email, nombreusuario, contrasena)
       //                 VALUES('$idsuario', '$email', '$username', '$password')";
        $resultado = mysqli_query($conexion, $consulta);
        if($resultado){
         header("location:EditarPerfil.php");
         echo '<script>  alert("Informacion actualizada"); </script>';
        }
        else{
            echo('Error');
        }

    }
}

if(isset($_POST['deletePerfil'])){
    if(
        strlen($_POST['usuario_id']) 
    ){
        $id = trim($_POST['usuario_id']);
        $name = trim($_POST['name']);
        $apellido = trim($_POST['apellido']);
        $sexo = trim($_POST['sexo']);
        $nacimiento = $_POST['nacimiento'];
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $tipo_usuario = null;
        $rol = null;
        $avatar = trim($_POST['avatar']);
        
        $consulta = "CALL sp_Usuarios('Dar de Baja', '$id', '$name', '$apellido', '$sexo', '$nacimiento', '$email', '$username', '$password', '$tipo_usuario', '$rol', '$avatar');";
       // $consulta = "INSERT INTO usuario(id_usuario, email, nombreusuario, contrasena)
       //                 VALUES('$idsuario', '$email', '$username', '$password')";
        $resultado = mysqli_query($conexion, $consulta);
        if($resultado){
            echo '<script>  alert("Usuario dado de baja"); </script>';
          header("location: ../../iniciosesion.php");
        }
        else{
            echo('Error');
        }

    }
}

if(isset($_POST['tipoperfil'])){
    if(
        strlen($_POST['usuario_id']) 
    ){
        $id = trim($_POST['usuario_id']);
        $name = null;
        $apellido = null;
        $sexo = null;
        $nacimiento =null;
        $email = null;
        $username = null;
        $password = null;
        $tipo_usuario =trim($_POST['tipousuario']);
        $rol = null;
        $avatar = null;
        
        $consulta = "CALL sp_Usuarios('Tipo Perfil', '$id', '$name', '$apellido', '$sexo', '$nacimiento', '$email', '$username', '$password', '$tipo_usuario', '$rol', '$avatar');";
       // $consulta = "INSERT INTO usuario(id_usuario, email, nombreusuario, contrasena)
       //                 VALUES('$idsuario', '$email', '$username', '$password')";
        $resultado = mysqli_query($conexion, $consulta);
        if($filas['tipousuario']==1){
			$_SESSION['usuario'] = $filas['nombreusuario'];
			//$nombre['nombres'] = $filas['nombres'];
			//$apellido['apellidos'] = $filas['apellidos'];
			header("location:../Cliente/MiPerfilPublico.php");
		}
		//Cliente
		else if($filas['tipousuario']==2){
			$_SESSION['usuario'] = $filas['nombreusuario'];
			//$_nombre['_nombres'] = $filas['nombres'];
			//$_apellido['_apellidos'] = $filas['apellidos'];
			header("location:../Cliente/MiPerfil.php");
		}

    }
}