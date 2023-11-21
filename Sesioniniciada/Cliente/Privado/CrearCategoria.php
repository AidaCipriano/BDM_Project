<?php
  session_start();
  include '../../controladores/conexion.php';

  $user = $_SESSION['usuario'];

  $consulta = "SELECT * FROM usuario where nombreusuario = '$user'";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $idusuario = $filas['id_usuario'];
    

  }

  include("../../controladores/CategoriasGestion.php");
  $user = $_SESSION['usuario'];

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
        <div class="">
          <div class="row g-0 border rounded mb-4 shadow-sm "> 
            <form action="" method="post" id="form_categoria" >
              <div class="col CrearLista_CajaImagen " >
                <img src="../../img/Listas/img/Predeterminado.jpg" width="100%" class="CrearLista_Imagen">
              </div>
              <div class="col CrearLista_CajaTexto">
                <div class=" CrearLista_Texto"> 
                  <div class="form-floating">
                    <h3 class="product__title text-center mt-5"> <label >Nombre de la Lista</label></h3>
                    <input type="name" class="form-control" id= "nombre_categoria" name="nombre_categoria"
                      required> 
                  </div>
                  <input type="input-email" class="form-control"  id="btn_id"  name="usuario_id" value="<?= $idusuario?>" >
                  <div class="form-floating">
                    <h4 class="product__title text-center mt-5"> <label> Descripcion</label></h3>
                    <input type="descripcion" class="form-control" name="descripcion"  id= "descripcioncat" 
                    required> 
                  </div>
                  <div class="item"> 
                    <p></p><p></p>
                    <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                    <input type="file" class="form-control" id="customFile" name="imagen_categoria" required> 
                  </div>
                  <p></p><p></p>
                  <div class="espacio_Boton">
                    <label class="nav-link px-2 text-black text-center"> 
                      <input class="btn btn-success" onclick="btn_guardarCategoria();" value="Guardar">
                      <p class="warnings" id="warnings"></p>
                      <input class="btn btn-primary"  type="submit"  name="CrearCategoria"  id="btn_guardar_categoria" value="Enviar">
                    </label>
                  </div>
                  <p></p><p></p>
                </div>
            
              </div>
            </form>
          </div>
        </div>
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
        <script src="../../../js/categoria.js"></script>
    </body>
</html>