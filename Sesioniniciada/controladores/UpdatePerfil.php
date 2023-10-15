<?php

	//session_start();
	//error_reporting(0);
	
	/*if (isset($_SESSION['user_id'])) {
	header('location:../pantalladeljuego.php');
	}*/

	require 'conexion.php';
	//echo('coenxion exito');
	

	$user = $_SESSION['usuario'];


  if(isset($_POST['updatePerfil'])){
    if(
        strlen($_POST['usuario_id'])     >= 1 &&
		strlen($_POST['name'])     >= 1 &&
        strlen($_POST['apellido'])  >= 1 &&
        strlen($_POST['sexo'])     >= 1 &&
        strlen($_POST['nacimiento'])  >= 1 &&
        strlen($_POST['email'])     >= 1 &&
        strlen($_POST['username'])  >= 1 &&
        strlen($_POST['password'])     >= 1 &&
        strlen($_POST['avatar'])  >= 1 
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
        
        $consulta = "CALL sp_Usuarios('Dar de baja', '$id', '$name', '$apellido', '$sexo', '$nacimiento', '$email', '$username', '$password', '$tipo_usuario', '$rol', '$avatar');";
       // $consulta = "INSERT INTO usuario(id_usuario, email, nombreusuario, contrasena)
       //                 VALUES('$idsuario', '$email', '$username', '$password')";
        $resultado = mysqli_query($conexion, $consulta);
        if($resultado){
          header("location: ../../iniciosesion.php");
        }
        else{
            echo('Error');
        }

    }
}