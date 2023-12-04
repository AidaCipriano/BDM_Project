<?php
 include ('controlador.php');
 include("../controladores/CategoriasGestion.php");
 include("../controladores/ProductosGestion.php");

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
        <form  action="" method="post" id="form_producto"  enctype="multipart/form-data" >
          <div class="col">
            <div class="row g-0 border rounded mb-4 shadow-sm ">
              <div class="col CrearLista_CajaImagen ">
                <div id="visorArchivo">
                  <!--Aqui se desplegará el fichero-->
                </div>
              </div>  
              
              <div class="col-md-1 "> </div>
              <div class="col CrearLista_CajaTexto"> 
              <p></p>
              <h5 class=" text-center">Informacion del Nuevo Producto</h5>
              <div class="formulario">
                <p></p>
                <div class="form-floating">
                  <input type="name" class="form-control"  placeholder="Ingrese el nombre del producto" id= "nombre_producto" name="nombre_producto"
                  required> 
                  <label for="floatingInput">Nombre</label>
                </div>
                <div class="form-floating">
                  <input type="name" class="form-control"  placeholder="Ingrese el nombre del producto" id= "descripcion_producto" name="descripcion_producto"
                  required> 
                  <label for="floatingInput">Descripcion</label>
                </div>
                  
                <div class="form-floating">
                  <input type="name" class="form-control"  placeholder="Ingrese el nombre del producto" id="precio_producto" name="precio_producto"
                  required> 
                  <label for="floatingInput">Precio</label>
                </div>

                <div class="form-floating">
                  <input type="name" class="form-control"  placeholder="Ingrese el nombre del producto" id="cantidaddisponible" name="cantidaddisponible"
                  required> 
                  <label for="floatingInput">Cantidad disponible</label>
                </div>
                  
                <div class="form-floating">
                
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="categoria_producto" id="categoria_producto" >
                    <option selected>Elija una opcion</option>
                    <?php 
                    
                    $consulta = "SELECT * FROM categoria";
                    $resultado = mysqli_query($conexion, $consulta);
                    while($filas = mysqli_fetch_array($resultado)){ ?>
                    <option value="<?php echo $filas['id_categoria'] ?> "><?php echo $filas['nombre'] ?>  </option>
                  <?php } ?></select>
                  
                  <label for="floatingSelect">Categoria</label>
                </div>
                  
                <div class="form-floating">
                  
                  <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  name="cotizar_vender_producto" id="cotizar_vender_producto" >
                    <option selected>Elija una opcion</option>
                    <option value="1">Cotizar </option>
                    <option value="2">Vender </option>
                  </select>
                  <label for="floatingSelect">Es para...</label>
                </div>
                  
                <div class="item"> 
                  <p></p><p></p>
                  <label class="nav-link px-2 text-black text-center">Elija un video</label>
                  <input type="file" class="form-control" id="video_producto" name="video_producto" accept="video/mp4"  onchange="return validarExt_video()" required > 
                </div>
                  
                <div class="item"> 
                  <p></p><p></p>
                  <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                  <input  type="file" id="archivoInput"  id="imagen_producto" class="form-control"  name="imagen_producto" accept="image/png, image/jpeg, image/jpg"  onchange="return validarExt_imagen()" required/>
                </div>
                <div class="item"> 
                  <p></p><p></p>
                  <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                  <input  type="file" id="archivoInput1"  id="imagen_producto1" class="form-control"  name="imagen_producto1" accept="image/png, image/jpeg, image/jpg"  onchange="return validarExt_imagen1()" required/>
                </div>
                <div class="item"> 
                  <p></p><p></p>
                  <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                  <input  type="file" id="archivoInput2"  id="imagen_producto2" class="form-control"  name="imagen_producto2" accept="image/png, image/jpeg, image/jpg"  onchange="return validarExt_imagen2()" required/>
                </div>
                  
                <p></p><p></p>
                <p></p><p></p>
                <div class="espacio_Boton">
                    <label class="nav-link px-2 text-black text-center"> 
                      <input class="btn btn-success" onclick="btn_guardarProducto();" value="Guardar">
                      <p class="warnings" id="warnings"></p>
                      <input class="btn btn-primary"  type="submit"  name="ActProducto"  id="btn_guardar_producto" value="Enviar">

                    </label>
                  </div>
                <p></p><p></p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
    
    <script src="../../js/menu.js"></script>
    <script src="../../js/producto.js"></script>

    <script type="text/javascript">

    function validarExt_imagen()
    {
        var archivoInput = document.getElementById('archivoInput');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.PNG|.JPG|.JPEG|.jpg|.jpeg|.png)$/i;
        if(!extPermitidas.exec(archivoRuta)){
            alert('Solo se permiten extensiones de imagen: jpg, png y jpeg');
            archivoInput.value = '';
            return false;
        }

        else
        {
            if (archivoInput.files && archivoInput.files[0]) 
            {
                var visor = new FileReader();
                visor.onload = function(e) 
                {
                    document.getElementById('visorArchivo').innerHTML = 
                    '<embed src="'+e.target.result+'" width="50%" height="50%" />';
                };
                visor.readAsDataURL(archivoInput.files[0]);
            }
        }
    }

    function validarExt_imagen1()
    {
        var archivoInput = document.getElementById('archivoInput1');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.PNG|.JPG|.JPEG|.jpg|.jpeg|.png)$/i;
        if(!extPermitidas.exec(archivoRuta)){
            alert('Solo se permiten extensiones de imagen: jpg, png y jpeg');
            archivoInput.value = '';
            return false;
        }

        else
        {
            if (archivoInput.files && archivoInput.files[0]) 
            {
                var visor = new FileReader();
                visor.onload = function(e) 
                {
                    document.getElementById('visorArchivo').innerHTML = 
                    '<embed src="'+e.target.result+'" width="50%" height="50%" />';
                };
                visor.readAsDataURL(archivoInput.files[0]);
            }
        }
    }
    function validarExt_imagen2()
    {
        var archivoInput = document.getElementById('archivoInput2');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.PNG|.JPG|.JPEG|.jpg|.jpeg|.png)$/i;
        if(!extPermitidas.exec(archivoRuta)){
            alert('Solo se permiten extensiones de imagen: jpg, png y jpeg');
            archivoInput.value = '';
            return false;
        }

        else
        {
            if (archivoInput.files && archivoInput.files[0]) 
            {
                var visor = new FileReader();
                visor.onload = function(e) 
                {
                    document.getElementById('visorArchivo').innerHTML = 
                    '<embed src="'+e.target.result+'" width="50%" height="50%" />';
                };
                visor.readAsDataURL(archivoInput.files[0]);
            }
        }
    }

    function validarExt_video()
    {
        var archivoInput = document.getElementById('video_producto');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.mp4|.MP4)$/i;
        if(!extPermitidas.exec(archivoRuta)){
            alert('Solo se permiten extensiones de video: mp4');
            archivoInput.value = '';
            return false;
        }

        
    }
    </script>

    


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
          <p class="footer__txt">Registrate para recibir las ultimas ofertas en tu correo electronico y comprar productos.</p>
          <input type="email" class="footer__input" placeholder="Enter your email">
        </div>
      </footer>
      <div class="Copyright"><p class="copy">© 2022, Echo</p></div>
      <script src="../../js/bootstrap.bundle.min.js"></script>
  </body>
</html>