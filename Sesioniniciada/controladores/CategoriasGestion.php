<?php

	//session_start();
	//error_reporting(0);
	
	/*if (isset($_SESSION['user_id'])) {
	header('location:../pantalladeljuego.php');
	}*/

	require 'conexion.php';
	//echo('coenxion exito');
	

	//$user = $_SESSION['usuario'];


    if(isset($_POST['CrearCategoria'])){
        if(
            strlen($_POST['usuario_id'])     >= 1 &&
            strlen($_POST['nombre_categoria'])  >= 1 &&
            strlen($_POST['descripcion'])     >= 1 
        ){
            $id_categoria = null;
            $nombre = trim($_POST['nombre_categoria']);
            $creador = trim($_POST['usuario_id']);
            $descripcion = trim($_POST['descripcion']);
            
            $consulta = "CALL sp_GestionCategorias('Crear', '$id_categoria', '$nombre', $creador, '$descripcion');";
    
            $resultado = mysqli_query($conexion, $consulta);
            $filas = mysqli_fetch_array($resultado);
            

            $categoria = $nombre;
            if($filas['Mensaje']=="Se registro con exito"){
                echo '<script> alert("La categoria se ha registrado con exito"); </script>';
                header("location: ../Cliente/Privado/CrearCategoria.php");
            }
            else if($filas['Mensaje']=='Categoria existente'){
                
                echo '<script>  alert("La categoria ya existe. Ingrese otra por favor"); </script>';
                header("location: ../Cliente/Privado/CrearCategoria.php");


            }
            else{
               alert('Error');
            }
    
        }
    }
    
    

if(isset($_POST['ActCategoria'])){
    if(
        strlen($_POST['usuario_id'])     >= 1 &&
        strlen($_POST['nombre_categoria'])  >= 1 &&
        strlen($_POST['descripcion'])     >= 1 
    ){
        $id_categoria = trim($_POST['categoria_id']);
        $nombre = trim($_POST['nombre_categoria']);
        $creador = trim($_POST['creador']);
        $descripcion = trim($_POST['descripcion']);
        
        $consulta = "CALL sp_GestionCategorias('Actualizar', '$id_categoria', '$nombre', '$creador', '$descripcion');";

        $resultado = mysqli_query($conexion, $consulta);
        if($resultado){
          //header("location: ../../iniciosesion.php");
          echo('Error');
        }
        else{
            echo('Error');
        }

    }
}

