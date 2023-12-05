<?php
  include ('controlador.php');

?>

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
            
            <h2 class="main-title"></h2>
               
                    
                    <?php include '../../../productostienda.php'; ?>
             
                
                
            </main>
  
    <script src="../../../js/menu.js"></script>
</body>
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
    <script src="../../../js/app.js"></script>
</html>


