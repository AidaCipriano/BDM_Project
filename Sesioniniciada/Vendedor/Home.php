<?php
  include ('controlador.php');

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Aetna</title>
    <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.JPG">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dropdowns.css" rel="stylesheet">
  </head>
  
  <body>
  <?php  include("header.php"); ?>
          
    <section class="degradado">
            <div class="Bievenida">
                <h1 class="Bievenida_Titulo ">Aetna es el lugar perfecto para comprar</h1>
                <p class="lead ">Encuentra lo que tanto buscas</p> 
                <br>
                <a class="boton1" href="tienda.php">Ver más productos</a> &nbsp;&nbsp;
            </div>
        </section>



        <main class="main">
            
            <div class="SubTitulos"> </div>
              <?php include '../../homepagno.php'; ?>
              
              <div class="espacio_Boton">
              <center> <a class="boton4" href="Tienda.php?id=<?php echo( $id ); ?>">Ver mas  </a> </center>
          </div>    
          
        </main>


        <script src="../../js/menu.js"></script>


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

        <script type="text/javascript">
            function buscar_ahora(buscar){
                var parametros = {"buscar": buscar};
                $.ajax({
                    data:parametros,
                    type: 'POST',
                    url: 'buscador.php',
                    success :function(data){
                        document.getElementById("datos_buscador").innerHTML = data;

                    }
                });
            }
        </script>
    </body>





</html>

    
