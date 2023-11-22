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
                <h1 class="fw-light">Mis Pedidos</h1>
              
            </section>

              
            <div class="album py-5 bg-light">
              <div class="container">
                <div class="text-center">
                  <label for="floatingSelect">Filtros</label>
                  <br><br>
                  <label for="floatingSelect">Todos los Cursos</label>
                  <select class="" id="floatingSelect" aria-label="Floating label select example"  id="TodosCursos" >
                    <option selected>Elija una opcion</option>
                    <option >Fecha y hora de la compra</option>
                    <option >Categoria</option>
                    <option >Producto</option>
                    <option >Calificacion</option>
                    <option >Precio</option>
                  </select>
                  <label> Categoria: </label>
                  <input id="Categoria">
                  <label> Producto: </label>
                  <input id="Producto">
                  <label> Fecha de compra: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31">
                  <br><br>
                </div>
                <br>
                <div class="tabla">
                  <table>
                    <thead>
                      <tr>
                        <th>Producto </th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Fecha y hora de compra </th>
                        <th>Estatus</th>
                        <th>Fecha y hora de entrega </th>
                        <th>Categoria</th>
                        <th>Calificacion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Consola</td>
                        <td><a href="Producto.html"><img src="../../img/products/consola2.jpg" width="90px" height="90px"></a></td>
                        <td>1000</td>
                        <td>23/08/2023 16:00hrs</td>
                        <td>Entregado</td>
                        <td>1/09/2023 16:00hrs</td>
                        <td>Tecnologia</td>
                        <td>5/5</td>
                      </tr>
                      <tr>
                        <td>Consola</td>
                        <td><a href="Producto.html"><img src="../../img/products/consola2.jpg" width="90px" height="90px"></a></td>
                        <td>1000</td>
                        <td>23/08/2023 16:00hrs</td>
                        <td>Entregado</td>
                        <td>1/09/2023 16:00hrs</td>
                        <td>Tecnologia</td>
                        <td>5/5</td>
                      </tr>
                      <tr>
                        <td>Consola</td>
                        <td><a href="Producto.html"><img src="../../img/products/consola2.jpg" width="90px" height="90px"></a></td>
                        <td>1000</td>
                        <td>23/08/2023 16:00hrs</td>
                        <td>Entregado</td>
                        <td>1/09/2023 16:00hrs</td>
                        <td>Tecnologia</td>
                        <td>5/5</td>
                      </tr>
                    </tbody>
                  </table>
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