<?php
  session_start();
  include '../controladores/conexion.php';
  $user = $_SESSION['usuario'];

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

       

      <main class="main">
        <section class="py-5 text-center container">
            <h1 class="fw-light">Tecnologia</h1>
            <h6 class="">Descripcion</h6>
        </section>


        <div class="row row-cols-1 row-cols-md-4 g-4">
          <div class="col">
            <div class="card h-100">
              <div class="row">
                  <div id="open">
                    <a href="#" class="thumbnail">
                      <img src="/img/products/accesorio1.jpg" class="card-img-top" alt="..." >
                    </a>
                  </div>
              </div>
              <div class="card-body">
                <h5 class="Cartas_Titulos">Teclado</h5>
                <h6 class="Cartas_Intructor">Por Johann Perez.</h6>
                <center>
                  <div class="pie-carta">
                   <a class="boton3" href="#">Comprar $165 MXN</a>
                </div>
                </center>
              </div>
            </div>
          </div>
          
          <div class="col">
              <div class="card h-100">
                <div class="row">
                    <div id="open">
                      <a href="#" class="thumbnail">
                        <img src="/img/products/accesorio2.JPG" class="card-img-top" alt="..." >
                      </a>
                    </div>
                </div>
                <div class="card-body">
                  <h5 class="Cartas_Titulos">Teclado</h5>
                  <h6 class="Cartas_Intructor">Un curso de Deiv Choi.</h6>
                 
                  <center>
                    <div class="pie-carta">
                     <a class="boton3" href="#">Comprar $165 MXN</a>
                  </div>
                  </center>
                </div>
              
              </div>
           
          </div>
            
          <div class="col">
            <div class="card h-100">
              <div class="row">
                  <div id="open">
                    <a href="#" class="thumbnail">
                      <img src="/img/products/accesorio1.jpg" class="card-img-top" alt="..." >
                    </a>
                  </div>
              </div>
              <div class="card-body">
                <h5 class="Cartas_Titulos">Teclado</h5>
                <h6 class="Cartas_Intructor">Por Johann Perez.</h6>
                <center>
                  <div class="pie-carta">
                   <a class="boton3" href="#">Comprar $165 MXN</a>
                </div>
                </center>
              </div>
            </div>
          </div>

            
          <div class="col">
            <div class="card h-100">
              <div class="row">
                  <div id="open">
                    <a href="#" class="thumbnail">
                      <img src="/img/products/accesorio2.JPG" class="card-img-top" alt="..." >
                    </a>
                  </div>
              </div>
              <div class="card-body">
                <h5 class="Cartas_Titulos">Teclado</h5>
                <h6 class="Cartas_Intructor">Un curso de Deiv Choi.</h6>
               
                <center>
                  <div class="pie-carta">
                   <a class="boton3" href="#">Comprar $165 MXN</a>
                </div>
                </center>
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
        <script src="../../js/bootstrap.bundle.min.js"></script>
        
        <script src="../../js/modal.js"></script>
    </body>
</html>