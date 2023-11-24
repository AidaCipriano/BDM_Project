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
    $avatar = $filas['imagen'];
    $nombre= $filas['nombres'];
    $apellido= $filas['apellidos'];

  }
  //$nombrecompleto = $nombre;
?>


<!DOCTYPE html>
<html lang="es" >
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

      <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="<?php echo( $avatar ) ?>" alt="img-avatar">
    
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
            <section class="py-5 text-center container">
                
                <h1 class="fw-light">Mis Listas</h1>
                
              
              </section>
  
              <div class="album py-5 bg-light">
                  <div class="container">
              
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                      <div class="col">
                          <div class="card shadow-sm">
  
                            <img src="../img/Listas/img/Predeterminado.jpg" width="100%" height="225">
                            <div class="card-body">
                              <dt><p class="Nombre-lista">Nombre de la lista</p></dt>
                              
                              <p class="card-text">Descripcion.</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <a type="button" class="btn btn-sm btn-outline-secondary" href="DetallesLista.html">Ver</a>
                                  <button type="button" class="btn btn-sm btn-outline-secondary red">Eliminar</button>
                                  
  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <div class="col">
                          <div class="card shadow-sm">
  
                            <img src="../img/Listas/img/Predeterminado.jpg" width="100%" height="225">
                            <div class="card-body">
                              <dt><p class="Nombre-lista">Nombre de la lista</p></dt>
                              
                              <p class="card-text">Descripcion.</p>
                              <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                  <a type="button" class="btn btn-sm btn-outline-secondary" href="DetallesLista.html">Ver</a>
                                  <button type="button" class="btn btn-sm btn-outline-secondary red">Eliminar</button>
                                </div>
                              </div>
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
        <script src="../../../js/bootstrap.bundle.min.js"></script>
        
        <script src="../../../js/modal.js"></script>
    </body>
</html>

