<?php
   include '../controladores/conexion.php';


  $id =  $_REQUEST['id'];
  
  $id_pro =  $_REQUEST['id_pro']; // id categoria

  $consulta = "CALL sp_InteraccionProducto('Ver Producto', '$id', '$id_pro');";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
   
    $nombre= $filas['nombrecompleto'];
    $producto = $filas['producto'];
    $vendedor= $filas['vendedor'];
    $costo = $filas['costo'];
    $descripcion= $filas['descripcion'];
    $fecha_creacion= $filas['fecha_creacion'];
    $cantidad_disponible = $filas['cantidad_disponible'];
    $categoria= $filas['categoria'];
    $contenido = 'data:image/jpeg;base64,' . base64_encode($filas['contenido']);
  }
  //$nombrecompleto = $nombre;
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
        <div class="row ">
          <div class="col">
            <div class="row g-0 border rounded mb-4 shadow-sm " width="500" height="750">
                <div class="col " width="200" height="950" >
                <img src="<?php echo $contenido; ?>" width="70%"  class="col CrearLista_CajaImagen" >
                </div>  
            
                <div class="col">
        
                  <h1 class="product__title text-center mt-5"><?php echo $producto; ?></h1>
                  <div class="row g-5">
              
                    <div class="col-md-11 text-ce">
              
                
                      <h3 class="pb-4 mb-4 fst-italic border-bottom">
              
                      </h3>
        
                      <article class="blog-post">
                      <h2 class="blog-post-title mb-1">Informacion</h2>
                      <p class="blog-post-meta">Publicado el <?php echo $fecha_creacion; ?> por <a href="#"><?php echo $nombre; ?></a></p>
        
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
        
        
                      <p><?php echo $descripcion; ?>.</p>
                      <hr>
                      <dt>Categoria</dt>
                      <dd><?php echo $categoria; ?></dd>
                      <dt>Cantidad disponible</dt>
                      <dd><?php echo $cantidad_disponible; ?></dd>
                      
        
                      <div class="product ">
                        <h3 class="product__price">$<?php echo $costo; ?> MX</h3> 
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
              
              <span class="img-container"><img src="../../img/Listas/img/Predeterminado.jpg" ca  ></img></span>
              
          
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
            <div class="col-lg-1" ></div>
                      <div class="col-lg-2  text-align: center">
              
              <span class="img-container"><img src="../../img/Listas/img/Predeterminado.jpg" ca  ></img></span>
              
          
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
            <div class="col-lg-1" ></div>
        
        
        
        
            <div class="col-lg-2  text-align: center">
              
              <span class="img-container"><img src="../../img/Listas/img/Predeterminado.jpg" ca  ></img></span>
              
          
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
            </div><!-- /.row -->
            <div class="col-lg-2" ></div>
        
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
        <script src="../../js/bootstrap.bundle.min.js"></script>
        
        <script src="../../js/modal.js"></script>
    
      </body>
</html>