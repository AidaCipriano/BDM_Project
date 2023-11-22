<?php
  include ('controlador.php');

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
            <section class="py-5 text-center container">
                <h1 class="fw-light">Categorias</h1>
              
            </section>

            <div class="album py-5 bg-light">
                <div class="container">
            
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">

                          <img src="https://concepto.de/wp-content/uploads/2014/08/programacion-2-e1551291144973.jpg" width="100%" height="225">
                          <div class="card-body">
                            <dt><p class="Nombre-lista">Programacion</p></dt>
                            <p>Creado por Juan Perez, el 23/02/2023 a las 13:05 horas</p>
                            <p class="card-text">Adentrate en los campos de la era moderna y del futuro.</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="/Sesioniniciada/Estudiante/DetallesCategorias.php">Ver</a>

                                

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


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
    </body>
</html>

