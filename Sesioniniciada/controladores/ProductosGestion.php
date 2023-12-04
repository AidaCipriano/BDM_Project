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
            strlen($_POST['cotizar_vender_producto'])     >= 1 &&
            !empty($_FILES['video_producto']['name'])     >= 1 &&
            !empty($_FILES['imagen_producto']['name'])     >= 1 
        ){

            if (!empty($_FILES['video_producto']['name'])) {
                
                $directorio_destino = "images/";
                
                
                $video_nombre = $_FILES['video_producto']['name'];
                $video_temp = $_FILES['video_producto']['tmp_name'];
    
                // Mover la imagen al directorio de destino
                move_uploaded_file($video_temp, $directorio_destino . $video_nombre);
    
    
                $video_path = $directorio_destino . $video_nombre;
                $videonombre = $video_nombre;
            }

            if (!empty($_FILES['imagen_producto']['name'])) {
                
                $fileName          = $_FILES['imagen_producto']['name'];
                $imagen_temp        = $_FILES['imagen_producto']['tmp_name'];

                $contenidoImagen = file_get_contents($imagen_temp);
                $contenidoImagenEscapado = mysqli_real_escape_string($conexion, $contenidoImagen);
            }
            if (!empty($_FILES['imagen_producto1']['name'])) {
                
                $fileName1          = $_FILES['imagen_producto1']['name'];
                $imagen_temp1        = $_FILES['imagen_producto1']['tmp_name'];

                $contenidoImagen1 = file_get_contents($imagen_temp1);
                $contenidoImagenEscapado1 = mysqli_real_escape_string($conexion, $contenidoImagen1);
            }
            if (!empty($_FILES['imagen_producto2']['name'])) {
                
                $fileName2          = $_FILES['imagen_producto2']['name'];
                $imagen_temp2        = $_FILES['imagen_producto2']['tmp_name'];

                $contenidoImagen2 = file_get_contents($imagen_temp2);
                $contenidoImagenEscapado2 = mysqli_real_escape_string($conexion, $contenidoImagen2);
            }


            $cotvender = trim( $_POST['cotizar_vender_producto']);
            $id_producto_vendedor = null;
            $vendedor = $id;
            $nombre =  trim($_POST['nombre_producto']);
            $costo = trim($_POST['precio_producto']);
            $descripcion =  trim($_POST['descripcion_producto']);
            $cantidad_disponible = trim($_POST['cantidaddisponible']);
           
            $categoria = trim($_POST['categoria_producto']);
            
            $consulta = "CALL sp_GestionProductos('Crear', '$id_producto_vendedor', '$vendedor', '$nombre',
             '$costo', '$descripcion', '$cantidad_disponible', '$cotvender', '$categoria', '$video_path', '$videonombre',
             '$contenidoImagenEscapado', '$fileName','$contenidoImagenEscapado1', '$fileName1','$contenidoImagenEscapado2', '$fileName2'
            );";
    
            $resultado = mysqli_query($conexion, $consulta);
            $filas = mysqli_fetch_array($resultado);
         
            
            if($filas['Mensaje']=="Se registro con exito"){
                echo '<script> alert("El producto se ha registrado con exito"); </script>';
                header("Refresh:0");
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
        strlen($_POST['usuario_id'])     >= 1 
    ){
        if (!empty($_FILES['video_producto']['name'])) {
                
            $directorio_destino = "images/";
            
            
            $video_nombre = $_FILES['video_producto']['name'];
            $video_temp = $_FILES['video_producto']['tmp_name'];

            // Mover la imagen al directorio de destino
            move_uploaded_file($video_temp, $directorio_destino . $video_nombre);


            $video_path = $directorio_destino . $video_nombre;
            $videonombre = $video_nombre;
        }
        else if (empty($_FILES['video_producto']['name'])){
            $video_path = null;
            $videonombre = '';
        }

        if ( !empty($_FILES['imagen_producto']['name'])) {
            
            
            $fileName          = $_FILES['imagen_producto']['name'];
            $imagen_temp        = $_FILES['imagen_producto']['tmp_name'];

            $contenidoImagen = file_get_contents($imagen_temp);
            $contenidoImagenEscapado = mysqli_real_escape_string($conexion, $contenidoImagen);
        }
        else if (empty($_FILES['imagen_producto']['name'])){
            $contenidoImagenEscapado = null;
            $fileName = '';
        }
        if (!empty($_FILES['imagen_producto1']['name'])) {
            
            $fileName1          = $_FILES['imagen_producto1']['name'];
            $imagen_temp1        = $_FILES['imagen_producto1']['tmp_name'];

            $contenidoImagen1 = file_get_contents($imagen_temp1);
            $contenidoImagenEscapado1 = mysqli_real_escape_string($conexion, $contenidoImagen1);
        }
        else if (empty($_FILES['imagen_producto1']['name'])){
            $contenidoImagenEscapado1 = null;
            $fileName1 = '';
        }
        if (!empty($_FILES['imagen_producto2']['name'])) {
            
            $fileName2          = $_FILES['imagen_producto2']['name'];
            $imagen_temp2        = $_FILES['imagen_producto2']['tmp_name'];

            $contenidoImagen2 = file_get_contents($imagen_temp2);
            $contenidoImagenEscapado2 = mysqli_real_escape_string($conexion, $contenidoImagen2);
        }
        else if (empty($_FILES['imagen_producto2']['name'])){
            $contenidoImagenEscapado2 = null;
            $fileName2 = '';
        }


        $cotvender = trim( $_POST['cotizar_vender_producto']);
        $id_producto_vendedor = null;
        $vendedor = $id;
        $nombre =  trim($_POST['nombre_producto']);
        $costo = trim($_POST['precio_producto']);
        $descripcion =  trim($_POST['descripcion_producto']);
        $cantidad_disponible = trim($_POST['cantidaddisponible']);
       
        $categoria = trim($_POST['categoria_producto']);
        
        $consulta = "CALL sp_GestionProductos('Actualizar', '$id_producto_vendedor', '$vendedor', '$nombre',
         '$costo', '$descripcion', '$cantidad_disponible', '$cotvender', '$categoria', '$video_path', '$videonombre', 
         '$contenidoImagenEscapado', '$fileName','$contenidoImagenEscapado1', '$fileName1','$contenidoImagenEscapado2', '$fileName2'
        );";

        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_fetch_array($resultado);

        if($filas['Mensaje']=="Se actualizo con exito"){
           // echo '<script> alert("El producto se ha registrado con exito"); </script>';
            //header("Refresh:0");
        }
        else{
           alert('Error');
        }

    }
}

