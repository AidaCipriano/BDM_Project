<?php
$id =  $_REQUEST['id']; // id categoria
  $id_cat =  $_REQUEST['id_cat']; // id categoria

  $consulta = "CALL sp_GestionCategorias('Editar Categoria', '$id_cat', 'null', 'null', 'null', 'null' )";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $nombre= $filas['nombre'];
    $descripcion= $filas['descripcion'];
    $imagen= $filas['imagen'];
    $rol = $filas['rol'];

  }


  include("CategoriasGestion.php");
  ?>

<main class="main">
        <div class="row ">
          <form action="" method="POST" id="form"  enctype="multipart/form-data">
            <div class="">
              <div class="row g-0 border rounded mb-4 shadow-sm ">
              <div class="col CrearLista_CajaImagen " >
                <img src="<?php echo( $imagen ) ?>" width="70%" class="CrearLista_Imagen">
              </div> 
              <div class="col CrearLista_CajaTexto">
                <div class=" CrearLista_Texto"> 
                  <div class="form-floating">
                    <h3 class="product__title text-center mt-5"> <label >Nombre de la Lista</label></h3>
                    <input type="name" class="form-control" name="nombre_categoria" id="nombre_categoria"   value="<?= $nombre?>"> 
                  </div>
                  <div class="form-floating">
                    <h4 class="product__title text-center mt-5"> <label> Descripcion</label></h3>
                    <input type="descripcion" class="form-control" name="descripcioncat"  id="descripcioncat"   value="<?= $descripcion?>"> 
                  </div>
                  
                  
                  <div class="item"> 
                    <p></p><p></p>
                    <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                      <input type="file" class="form-control" id="customFile"  id="imagen"  name="imagen"> 
                  </div>
                  <p></p><p></p>
                  <input type="input-user" class="form-control"  id="btn_rol" name="rol" value="<?= $rol?>" > 

                  <div class="espacio_Boton">
                    <label class="nav-link px-2 text-black text-center"> 
                      <input class="btn btn-success" onclick="btn_guardarCategoria();" value="Guardar Cambios">
                      <p class="warnings" id="warnings"></p>
                      <input class="btn btn-primary"  type="submit"  name="ActCategoria"  id="btn_guardar_categoria" value="Enviar">
                    </label>
                    <p></p>
                    
                 </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>