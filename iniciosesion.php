<?php
    include("Sesioniniciada/controladores/login.php");

?>


<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Tienda Online</title>
        <meta name="viewport" content="width=devide-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="icon" type="image/png" href="img/logo.JPG">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        

        <link href="css/signin.css" rel="stylesheet">
    </head>
    
    <body>
        <header class="p-2 text-bg-dark">
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
           
                    <li><a href="home.php" class="Titulo nav-ink">AETNA</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <li><a href="tienda.php" class="nav-link px-2 text-white">Cursos</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                  
                </ul>
        
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-5" role="search">
                  <input type="search" class="form-control " placeholder="Buscar ..." aria-label="Search">
                </form>
        
                <div class="text-end">
                    <a href="iniciosesion.php" class="Navegador">Entra</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" href="registro.php" class="btn btn-outline-light me-2">  Registrate </a>
                </div>
              </div>
            </div>
          </header>

      
        <main class="main-registrar ">
        <div class="form-signin w-100 m-auto">

            <form action="" method="POST" id="form" class="form-login" >
                 <div class="inicio-box" >
                    <h2 class="">Inicio de sesion</h2>
                    <br>
                    <div class="formulario">
                        <div class="form-floating"> 
                            <input type="input-email" class="form-control"  placeholder="Ingrese su nombre de usuario" id="email" name="email" >
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating"> 
                            <input type="password" class="form-control"  placeholder="Ingrese su contaseña" id="password" name="password" >
                            <label for="floatingInput">Contraseña</label>
                        </div>
                        <br>

                        <input class="btn-login"  onclick="btn_iniciarsesion();"  value="Login">
                        
                        <p class="warnings" id="warnings"></p>
                        <input class="btn btn-primary"  type="submit"  name="login" id="btnlogin" value="Enviar">
                    </div>
                </form>
            </div>
        </main>
    </body>
    
    
    <script src="js/iniciosesion.js"></script>


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

</html>