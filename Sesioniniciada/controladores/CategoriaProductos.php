<?php
$id =  $_REQUEST['id']; // id categoria
$id_cat =  $_REQUEST['id_cat']; // id categoria
$id_catnom =  $_REQUEST['id_catnom']; // id categoria
  ?>

<main class="main">
        
        <section class="py-5 text-center container">
            <h1 class="fw-light"> <?php echo $id_catnom ?></h1>
        </section>


        <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php 
            $consulta =  "CALL sp_GestionCategorias('VerProductos', '$id_cat', 'null', 'null', 'null', 'null' )";
            $resultado = mysqli_query($conexion, $consulta);
            while($filas = mysqli_fetch_array($resultado)){ 
                    
                $nombrecategoria= $filas['nombrecategoria'];
                $descripcion= $filas['descripcion'];
            ?>

          <div class="col">
            <div class="card h-100">
              <div class="row">
                  <div id="open">
                    <a href="#" class="thumbnail">
                    <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($filas['contenido'])?>" class="card-img-top" width="100%" height="225" >
                    </a>
                  </div>
              </div>
              <div class="card-body">
              <h5 class="Cartas_Titulos"> <?php echo $filas['nombreproducto'] ?></h5>
                <h6 class="Cartas_Intructor">Por <?php echo $filas['nombrecompleto'] ?>.</h6>
                <center>
                    <div class="pie-carta">
                        <a class="boton3" href="#">Comprar $<?php echo $filas['costo'] ?> MXN</a>
                    </div>
                </center>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      
      </main>