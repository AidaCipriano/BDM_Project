<?php
  session_start();
  include '../../controladores/conexion.php';

  $user = $_SESSION['usuario'];
  $id =  $_REQUEST['id']; // id categoria

  $consulta = "CALL sp_GestionCategorias('Editar Categoria', '$id', 'null', 'null', 'null' )";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $nombre= $filas['nombre'];
    $descripcion= $filas['descripcion'];
    

  }
?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Aetna</title>
    <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../css/estilos.css">
    <link rel="stylesheet" href="../../../css/estilosmodals.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.JPG">
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/dropdowns.css" rel="stylesheet">
  </head>
  <body>
  <?php  include("header.php"); ?>
     
      <main class="main">
        <div class="row ">
          <form>
            <div class="">
              <div class="row g-0 border rounded mb-4 shadow-sm ">
              <div class="col CrearLista_CajaImagen " >
                <img src="../../../img/Listas/img/Predeterminado.jpg" width="100%" class="CrearLista_Imagen">
              </div> 
              <div class="col CrearLista_CajaTexto">
                <div class=" CrearLista_Texto"> 
                  <div class="form-floating">
                    <h3 class="product__title text-center mt-5"> <label >Nombre de la Lista</label></h3>
                    <input type="name" class="form-control" name="name"  required  value="<?= $nombre?>"> 
                  </div>
                  <div class="form-floating">
                    <h4 class="product__title text-center mt-5"> <label> Descripcion</label></h3>
                    <input type="descripcion" class="form-control" name="description"  required  value="<?= $descripcion?>"> 
                  </div>
                  
                  
                  <div class="item"> 
                    <p></p><p></p>
                    <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                      <input type="file" class="form-control" id="customFile" name="avatar" required> 
                  </div>
                  <p></p><p></p>
                  
                  <label class="nav-link px-2 text-black text-center"> <button type="button" class="btn btn-success ">Guardar</button></label>
                  <p></p><p></p>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    
    <footer class="main-footer">
            <div class="footer__section">
                <h2 class="footer__title">Conocenos</h2>
                <p class="footer__txt">blah blah </p>
            </div>
            <div class="footer__section">
                <h2 class="footer__title">Metodos de Pago</h2>
                <p class="footer__txt">blah blah </p>
            </div>
            <div class="footer__section">
                <h2 class="footer__title">Contactanos</h2>
                <p class="footer__txt">Email:</p>
            </div>
            <div class="footer__section">
                <h2 class="footer__title">¿Necesitas Ayuda?</h2>
                <p class="footer__txt">blah blah </p>
            </div>
            <div class="footer__section">
                <h2 class="footer__title">Subscribete</h2>
                <p class="footer__txt">Registrate para recibir las ultimas ofertas 
                    en tu correo electronico y comprar productos.</p>
                    <input type="email" class="footer__input" placeholder="Enter your email">
            </div>
            
        </footer>
        <div class="Copyright"><p class="copy">© 2022, Echo</p></div>
        <script src="../../../js/bootstrap.bundle.min.js"></script>
        
        <script src="../../../js/modal.js"></script>
    </body>
</html>