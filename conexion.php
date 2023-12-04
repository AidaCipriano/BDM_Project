<?php
   
   function conectar(){
    $host = "localhost";
    $db = "bd_bdm_project";
    $user = "root";
    $pass = "";
    $conexion = mysqli_connect( $host, $user, $pass, $db);
    mysqli_set_charset($conexion, "utf8");
    mysqli_select_db($conexion, $db);

    return $conexion;
   }

   
?>