<?php

	//session_start();
	//error_reporting(0);
	
	/*if (isset($_SESSION['user_id'])) {
	header('location:../pantalladeljuego.php');
	}*/

	require 'conexion.php';
	//echo('coenxion exito');
	
    $id =  $_REQUEST['id']; // id categoria
    $response = array();

	//$user = $_SESSION['usuario'];


    if(isset($_POST['CrearCategoria'])){
        
        if(!empty($_FILES['fileTest']['name'])){
        
        if(
            strlen($_POST['nombre_categoria'])  >= 1 &&
            strlen($_POST['descripcion'])     >= 1 
        ){

            if ($_FILES['fileTest']['size'] > 0) {
                if(trim($_POST['rol']) == 1){
                    $directorio_destino = "images/";
                }
                else if(trim($_POST['rol'])== 2){
                    $directorio_destino = "Sesioniniciada/Cliente/images/";
                }
            
            
           
                // Directorio donde se guardarán las imágenes (ajustar según tu configuración)
    
                // Obtener información de la imagen
                $imagen_nombre = $_FILES['fileTest']['name'];
                $imagen_temp = $_FILES['fileTest']['tmp_name'];
    
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

            $id_categoria = null;
            $nombre = trim($_POST['nombre_categoria']);
            $creador = $id ;
            $descripcion = trim($_POST['descripcion']);
            
            $consulta = "CALL sp_GestionCategorias('Crear', '$id_categoria', '$nombre', '$creador', '$imagen_path', '$descripcion');";
    
            $resultado = mysqli_query($conexion, $consulta);
            $filas = mysqli_fetch_array($resultado);
            

            $categoria = $nombre;
            if($filas['Mensaje']=="Se registro con exito"){
                echo '<script> alert("La categoria se ha registrado con exito"); </script>';
                //header("location: /CrearCategoria.php");
            }
            else if($filas['Mensaje']=='Categoria existente'){
                
                echo '<script>  alert("La categoria ya existe. Ingrese otra por favor"); </script>';
                //header("location: ../Privado/CrearCategoria.php");


            }
            else{
               alert('Error');
            }
    
        }
    }

    else {
        echo 'Por favor, seleccione una imagen.';
    }
}
    
    

if(isset($_POST['ActCategoria'])){
    if(
        strlen( $_REQUEST['id'])     >= 1 
    ){
        if (!empty($_FILES['imagen']['name'])) {
            
            if(trim($_POST['rol']) == 1){
                $directorio_destino = "images/";
            }
            else if(trim($_POST['rol'])== 2){
                $directorio_destino = "..images/";
            }

            $imagen_nombre = $_FILES['imagen']['name'];
            $imagen_temp = $_FILES['imagen']['tmp_name'];

            // Mover la imagen al directorio de destino
            move_uploaded_file($imagen_temp, $directorio_destino . $imagen_nombre);


            $imagen_path = $directorio_destino . $imagen_nombre;
            
           
            $id_categoria =  $_REQUEST['id_cat'];
            $nombre = trim($_POST['nombre_categoria']);
            $creador = null ;
            $descripcion = trim($_POST['descripcioncat']);
            
            $consulta = "CALL sp_GestionCategorias('Actualizar', '$id_categoria', '$nombre', '$creador', '$imagen_path', '$descripcion');";

            $resultado = mysqli_query($conexion, $consulta);
            if($resultado){
                echo '<script>  alert("Informacion actualizada"); </script>';
            }
            else{
                echo('Error');
            }
        }
          
        if (empty($_FILES['imagen']['name'])) {
          
            $imagen_path = null;
            
            
            $id_categoria = $_REQUEST['id_cat'];
            $nombre = trim($_POST['nombre_categoria']);
            $creador = null ;
            $descripcion = trim($_POST['descripcioncat']);
        
            $consulta = "CALL sp_GestionCategorias('Actualizar', '$id_categoria', '$nombre', '$creador', '$imagen_path', '$descripcion');";

            $resultado = mysqli_query($conexion, $consulta);
            if($resultado){
                echo '<script>  alert("Informacion actualizada"); </script>';
            }
            else{
                echo('Error');
            }

        
        }

        

    }


}

