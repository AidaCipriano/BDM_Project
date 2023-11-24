<?php

	//session_start();
	//error_reporting(0);
	
	/*if (isset($_SESSION['user_id'])) {
	header('location:../pantalladeljuego.php');
	}*/

	require 'conexion.php';
	//echo('coenxion exito');
	
    $id =  $_REQUEST['id']; // id categoria

	//$user = $_SESSION['usuario'];


    if(isset($_POST['CrearProducto'])){
        if(
            strlen($_POST['nombre_producto'])  >= 1 &&
            strlen($_POST['descripcion_producto'])     >= 1 &&
            strlen($_POST['precio_producto'])     >= 1 &&
            strlen($_POST['categoria_producto'])     >= 1 &&
            strlen($_POST['cotizar_vender_producto'])     >= 1 /*&&
            strlen($_POST['video_producto'])     >= 1 &&
            strlen($_POST['imagen_producto'])     >= 1 */
        ){

            $cotvender = trim( $_POST['cotizar_vender_producto']);
            $id_producto_vendedor = null;
            $vendedor = $id;
            $nombre =  trim($_POST['nombre_producto']);
            $costo = trim($_POST['precio_producto']);
            $descripcion =  trim($_POST['descripcion_producto']);
            $cantidad_disponible = trim($_POST['cantidaddisponible']);
           
            $categoria = trim($_POST['categoria_producto']);
            
            $consulta = "CALL sp_GestionProductos('Crear', '$id_producto_vendedor', '$vendedor', '$nombre',
             '$costo', '$descripcion', '$cantidad_disponible', '$cotvender', '$categoria');";
    
            $resultado = mysqli_query($conexion, $consulta);
            $filas = mysqli_fetch_array($resultado);
            
            if($filas['Mensaje']=="Se registro con exito"){
                echo '<script> alert("El producto se ha registrado con exito"); </script>';
                //header("location: /CrearCategoria.php");
            }
            else if($filas['Mensaje']=='El producto ya existe'){
                
                echo '<script>  alert("El producto ya existe. Ingrese otra por favor"); </script>';
                //header("location: ../Privado/CrearCategoria.php");


            }
            else{
               alert('Error');
            }
    
        }
    }
    
    

if(isset($_POST['ActProducto'])){
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

