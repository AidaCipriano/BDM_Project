<?php
  //session_start();
  include '../../controladores/conexion.php';
  //$user = $_SESSION['usuario'];

  $id =  $_REQUEST['id'];

  $consulta = "SELECT * FROM usuario where id_usuario = $id";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $usuario= $filas['nombreusuario'];
    

  }

?>
