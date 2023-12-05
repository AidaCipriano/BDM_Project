<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Aetna</title>
        <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="icon" type="image/png" href="img/logo.JPG">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">


    </head>
    <body>
    <header class="p-2 text-bg-dark">
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
           
                    <li><a href="home.php" class="Titulo nav-ink">AETNA</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><a href="tienda.php" class="nav-link px-2 text-white">Tienda</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                  
                </ul>
        
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-5" role="search">
                  <input onkeyup="buscar_ahora($('#buscar_1').val());" type="search" class="form-control " placeholder="Buscar ..." aria-label="Search">
                </form>
        
                <div class="text-end">
                    <a href="iniciosesion.php" class="Navegador">Entra</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" href="registro.php" class="btn btn-outline-light me-2">  Registrate </a>
                </div>
              </div>
            </div>
          </header>
            <section class="degradado">
                <div class="Bievenida">
                    <h1 class="Bievenida_Titulo ">Aetna es el lugar perfecto para comprar</h1>
                    <p class="lead ">Encuentra lo que tanto buscas</p> 
                    <br>
                    <a class="boton1" href="tienda.php">Ver más productos</a> &nbsp;&nbsp;
                    <a class="boton2" href="registro.php">Crea tu cuenta gratis</a>
                </div>
            </section>
          


        <main class="main">
            
        <h2 class="main-title"></h2>

            <div id="datos_buscador"> </div>

            <?php include 'homepagno.php'; ?>
         
                   
          <div class="espacio_Boton">
              <center> <a class="boton4" href="tienda.php">Ver mas  </a> </center>
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