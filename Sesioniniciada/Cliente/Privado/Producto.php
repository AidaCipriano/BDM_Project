<?php
  session_start();
  include '../../controladores/conexion.php';

  $user = $_SESSION['usuario'];


  

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
        <div class="row ">
          <div class="col">
            <div class="row g-0 border rounded mb-4 shadow-sm " width="500" height="750">
                <div class="col " width="200" height="950" >
                <img src="../../img/Listas/img/Predeterminado.jpg" width="100%" class="col CrearLista_CajaImagen" >
                </div>  
            
                <div class="col">
        
                  <h1 class="product__title text-center mt-5">Titulo</h1>
                  <div class="row g-5">
              
                    <div class="col-md-11 text-ce">
              
                
                      <h3 class="pb-4 mb-4 fst-italic border-bottom">
              
                      </h3>
        
                      <article class="blog-post">
                      <h2 class="blog-post-title mb-1">Descripcion</h2>
                      <p class="blog-post-meta">Publicado en Enero  1, 2021 por <a href="#">Mark</a></p>
        
                      <form>
                        <p class="clasificacion ">
                          <label class="nav-link px-2 text-black ">Clasificacion</label>
                          <input id="radio5" type="radio" name="estrellas" value="5"><!--
                          --><label for="radio5">★</label><!--
                          --><input id="radio4" type="radio" name="estrellas" value="4"><!--
                          --><label for="radio4">★</label><!--
                          --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                          --><label for="radio3">★</label><!--
                          --><input id="radio2" type="radio" name="estrellas" value="2"><!--
                          --><label for="radio4¿2">★</label><!--
                          --><input id="radio1" type="radio" name="estrellas" value="1"><!--
                          --><label for="radio1">★</label>
                        </p>
                        
                        </form>
        
        
                      <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic typography, lists, tables, images, code, and more are all supported as expected.</p>
                      <hr>
                      <dt>Categoria</dt>
                      <dd>The language used to describe and define the content of a Web page</dd>
                      <dt>Cantidad disponible</dt>
                      <dd>Used to describe the appearance of Web content</dd>
                      
        
                      <div class="product ">
                        <h3 class="product__price">$Precio</h3> 
                        <p></p>
                        <div>
                          <button type="button" class="btn btn-warning">Agregar al carrito</button>
                          <button type="button" class="btn btn-secondary">Agregar a lista</button>
                        </div>
                        
                      </div>
                      <p></p>
          
                    </article>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        
        
        
        <div class="row g-0 border rounded mb-4 shadow-sm " width="500" height="750">
          <p></p>
          <h3 class="text-center">Comentarios</h3>
          <p></p><p></p><p></p><p></p>
        
          <div class="row text-center">
            <div class="col-lg-2" ></div>
            <div class="col-lg-2  text-align: center">
              
              <span class="img-container"><img src="../../img/Listas/img/Predeterminado.jpg" width="90px" height="90px"  ></img></span>
              
          
              <h2 class="fw-normal">Titulo</h2> 
              <p><a href="#">Usuario</a></p>
              <p> Descripcion Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
             
              <form>
              <p class="clasificacion text-center ">
                <label class="nav-link px-2 text-black ">Clasificacion</label>
                <input id="radio5" type="radio" name="estrellas" value="5"><!--
                --><label for="radio5">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" value="4"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" value="2"><!--
                --><label for="radio4¿2">★</label><!--
                --><input id="radio1" type="radio" name="estrellas" value="1"><!--
                --><label for="radio1">★</label>
              </p>
              
              </form>
            </div><!-- /.col-lg-4 -->
           
          
            <div class="col-lg-2  text-align: center">
              
              <span class="img-container"><img src="../../img/Listas/img/Predeterminado.jpg" width="90px" height="90px"  ></img></span>
              
          
              <h2 class="fw-normal">Titulo</h2> 
              <p><a href="#">Usuario</a></p>
              <p> Descripcion Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
             
              <form>
              <p class="clasificacion text-center ">
                <label class="nav-link px-2 text-black ">Clasificacion</label>
                <input id="radio5" type="radio" name="estrellas" value="5"><!--
                --><label for="radio5">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" value="4"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" value="2"><!--
                --><label for="radio4¿2">★</label><!--
                --><input id="radio1" type="radio" name="estrellas" value="1"><!--
                --><label for="radio1">★</label>
              </p>
              
              </form>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-2  text-align: center">
              
              <span class="img-container"><img src="../../img/Listas/img/Predeterminado.jpg" width="90px" height="90px"  ></img></span>
              
          
              <h2 class="fw-normal">Titulo</h2> 
              <p><a href="#">Usuario</a></p>
              <p> Descripcion Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
             
              <form>
              <p class="clasificacion text-center ">
                <label class="nav-link px-2 text-black ">Clasificacion</label>
                <input id="radio5" type="radio" name="estrellas" value="5"><!--
                --><label for="radio5">★</label><!--
                --><input id="radio4" type="radio" name="estrellas" value="4"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio2" type="radio" name="estrellas" value="2"><!--
                --><label for="radio4¿2">★</label><!--
                --><input id="radio1" type="radio" name="estrellas" value="1"><!--
                --><label for="radio1">★</label>
              </p>
              
              </form>
            </div><!-- /.col-lg-4 -->
        </div>
        
        <div class="row g-0 border rounded mb-4 shadow-sm " width="500" height="750">
          
          <p></p>
          <h3 class="text-center">Tu opinion importa</h3>
          <p></p>
        
          <div class="row text-center">
        
          <div class="form-floating">
          <input type="comentario" class="form-control"  placeholder="Comentario"  name="comentario"
          required> 
          <label for="floatingInput">Comentario</label>
          
          <p></p>
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