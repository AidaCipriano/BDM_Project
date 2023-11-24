<?php
  //ssession_start();
  include ('controlador.php');
  //$user = $_SESSION['usuario'];

  $id =  $_REQUEST['id'];

  $name = null;
  $apellido = null;
  $sexo = null;
  $nacimiento = null;
  $email = null;
  $username = null;
  $password = null;
  $tipo_usuario = null;
  $rol = null;
  $avatar = null;

  $consulta = "CALL sp_Usuarios('Mi Perfil', '$id', '$name', '$apellido', '$sexo', '$nacimiento', '$email', '$username', '$password', '$tipo_usuario', '$rol', '$avatar');";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
   
    $nombre= $filas['nombres'];
    $apellido= $filas['apellidos'];
    $avatar = $filas['imagen'];
  }
  //$nombrecompleto = $nombre;
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Aetna</title>
    <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/estilosmodals.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.JPG">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dropdowns.css" rel="stylesheet">
  </head>
  
  <body>
  <?php  include("header.php"); ?>
      <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                <img id="avatar" src="<?php echo( $avatar ) ?>" alt="Imagen de perfil">
    
                </div>
                <button type="button" class="boton-portada">
                    <a class=" nav-link  text-white" href="EditarPerfil.php?id=<?php echo( $id ); ?>"  >Editar Perfil</a> 
                   
                </button>
                
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"> <?php echo( $nombre ); ?> <?php echo( $apellido ); ?>  </h3>
            </div>

    
            <div class="album py-5 bg-light">
                <div class="container">
                  <h3 class="titulo text-lg-center">Productos: </h3>
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                      <div class="card h-100">
                        <div class="row">
                            <div id="open">
                              <a href="#" class="thumbnail">
                                <img src="../../img/products/consola2.jpg" class="card-img-top" alt="..." >
                              </a>
                            </div>
                        </div>
                        <div class="card-body">
                          <h5 class="Cartas_Titulos">Consola</h5>
                          <h6 class="Cartas_Intructor">Un curso de Johann Perez.</h6>
                         
                          <center>
                            <div class="pie-carta">
                             <a class="boton3" href="Producto.php">Ver mi curso</a>
                          </div>
                          </center>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
    
    
        </div>
         <p></p>  
    </section>





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
        <script src="../../js/bootstrap.bundle.min.js"></script>
        
        <script src="../../js/modal.js"></script>
    </body>
</html>

