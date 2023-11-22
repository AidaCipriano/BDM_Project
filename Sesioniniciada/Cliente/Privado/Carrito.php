<?php
 include ('controlador.php');
  

?>


<!DOCTYPE html>
<html lang="es">
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
  
  <?php  include("header.php"); ?>
  
  <main class="main">
        <body>
          <div class="container">
            <p></p>
            <h1>Carrito</h1>
            <hr>
            <table class="table">
                <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col">Item</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Acción</th>
                  <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody id="items"></tbody>
                <tfoot>
                  <tr id="footer">
                  <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
                  </tr>
                  
                </tfoot>
                
                </table>
    
                
    
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  
                  <a href="PAGAR.php"><button class="btn btn-info  text-white " id="pagar-carrito" type="button">Pagar</button></a>
                </div><p></p>
              <div class="row" id="cards"></div>
              
              
            </div>
          
            <template id="template-footer">
                  <th scope="row" colspan="2">Total productos</th>
                  <td>10</td>
                  <td>
                      <button class="btn btn-danger btn-sm" id="vaciar-carrito">
                          vaciar todo
                      </button>
                  </td>
                  <td class="font-weight-bold">$ <span></span></td>
              </template>
              
              <template id="template-carrito">
                <tr>
                  <th scope="row">id</th>
                  <td>Café</td>
                  <td>1</td>
                  <td>
                      <button class="btn btn-info btn-sm">
                          +
                      </button>
                      <button class="btn btn-danger btn-sm">
                          -
                      </button>
                  </td>
                  <td>$ <span>500</span></td>
                </tr>
              </template>
          
        
    
    
    
            <template id="template-card">
              <div class="col-12 mb-2 col-md-4">
                <div class="card">
                  <img src="" alt="" class="card-img-top">
                <div class="card-body">
                  <h5>Titulo</h5>
                  <p>precio</p>
                  <button class="btn btn-dark">Comprar</button>
                </div>
                </div>
              </div>
              </template>
            
              
          <script src="../../js/app.js"></script>
          </body>
            
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
        
        <script src="../../../js/Modal_Curso.js"></script>
    </body>
</html>