<?php
  include '../controladores/conexion.php';

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

          <main class="main">
            <section class="py-5 text-center container">
                <h1 class="fw-light">Mis Ventas</h1>
              
            </section>
            <div class="album py-5 bg-light">
              <div class="container">
                <div class="text-center">
                  <label for="floatingSelect">Filtro</label>
                  <select class="" id="floatingSelect" aria-label="Floating label select example"  id="TodosCursos" >
                    <option selected>Elija una opcion</option>
                    <option > Consulta detallada</option>
                    <option > Consulta agrupada</option>
                  </select>
                  <br><br>
                  <label for="floatingSelect">Todos los Cursos</label>
                  <select class="" id="floatingSelect" aria-label="Floating label select example"  id="TodosCursos" >
                    <option selected>Elija una opcion</option>
                    <option >Fecha y hora de la venta</option>
                    <option >Categoria</option>
                    <option >Producto</option>
                    <option >Calificacion</option>
                    <option >Precio</option>
                    <option >En Existencia</option>
                  </select>
                  <label> Categoria: </label>
                  <input id="Categoria">
                  <label> Producto: </label>
                  <input id="Producto">
                  <label> Fecha inicio: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
                  <label> Fecha final: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
                  <br><br>
                  <label for="floatingSelect">Por Curso</label>
                  <select class="" id="floatingSelect" aria-label="Floating label select example"  id="TodosCursos" >
                    <option selected>Elija una opcion</option>
                    <option >Mes-Año de la venta</option>
                    <option >Categoria</option>
                    <option >Ventas</option>
                  </select>
              
                  <label> Categoria: </label>
                  <input id="Categoria">
                  <label> Fecha inicio: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
                  <label> Fecha final: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
              </div>
              <br>

                <div class="wrapper">
                  <div class="one"></div>
                 
                </div>

                
              </div>
             
             
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
    </body>





</html>