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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="icon" type="image/png" href="img/logo.JPG">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dropdowns.css" rel="stylesheet">
  </head>
  
  <body>
  <?php  include("header.php"); ?>
    
    <main class="main">
            <div class="row ">
                <form>
                    <div class="col">
                      <div class="row g-0 border rounded mb-4 shadow-sm ">
                          <div class="col CrearLista_CajaImagen ">
                            <img src="../../img/Listas/img/Predeterminado.jpg" width="100%" >
                          </div>  
                          <div class="col-md-1 ">
                            
                          </div>
                          <div class="col CrearLista_CajaTexto"> 
                            <p></p>
                            <h5 class=" text-center">Informacion del Producto</h5>
                            <div class="formulario">
                              <p></p>
                              <div class="form-floating">
                                  <input type="name" class="form-control"  placeholder="Ingrese el nombre del producto"  name="name_product"
                                  required> 
                                  <label for="floatingInput">Nombre</label>
                              </div>
                              <div class="form-floating">
                                <input type="name" class="form-control"  placeholder="Ingrese el nombre del producto"  name="name_product"
                                required> 
                                <label for="floatingInput">Descripcion</label>
                              </div>

          
                              <div class="form-floating">
                                <input type="name" class="form-control"  placeholder="Ingrese el nombre del producto"  name="name_product"
                                required> 
                                <label for="floatingInput">Precio</label>
                              </div>
                                
                            
          
                            <div class="form-floating">
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  type="sexo" name="sexo" id="sexo" >
                                <option selected>Elija una opcion</option>
                                <option value="1">Categoria1 </option>
                                
                              </select>
                              <label for="floatingSelect">Categoria</label>
                            </div>

                            <div class="form-floating">
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  type="sexo" name="sexo" id="sexo" >
                                <option selected>Elija una opcion</option>
                                <option value="1">Cotizar </option>
                                <option value="1">Vender </option>
                              </select>
                              <label for="floatingSelect">Es para...</label>
                            </div>
          

          
                            <div class="item"> 
                              <p></p><p></p>
                              <label class="nav-link px-2 text-black text-center">Elija un video</label>
                                  <input type="file" class="form-control" id="customFile" name="avatar" required> 
                            </div>

                            <div class="item"> 
                              <p></p><p></p>
                              <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                                  <input type="file" class="form-control" id="customFile" name="avatar" required> 
                            </div>
  
                            <p></p><p></p>
                           
          
                            <p></p><p></p>
                            <label class="nav-link px-2 text-black text-center"> <button type="button" class="btn btn-success "  type="submit" value="Enviar" >Guardar</button></label>
                           
                            <p></p><p></p>

                            <label class="nav-link px-2 text-black text-center"> <button type="button" class="btn btn-danger">Dar de baja</button></label>
                            
                        </div>
                        
                    </div>
                </div>
                </form>
                
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