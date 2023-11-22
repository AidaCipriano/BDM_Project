<?php
$id =  $_REQUEST['id']; // id categoria
  $id_cat =  $_REQUEST['id_cat']; // id categoria

  $consulta = "CALL sp_GestionCategorias('Editar Categoria', '$id_cat', 'null', 'null', 'null' )";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $nombre= $filas['nombre'];
    $descripcion= $filas['descripcion'];
    

  }
  ?>

<main class="main">
        <div class="row ">
          <form>
            <div class="">
              <div class="row g-0 border rounded mb-4 shadow-sm ">
              <div class="col CrearLista_CajaImagen " >
                <img src="../../../img/Listas/img/Predeterminado.jpg" width="100%" class="CrearLista_Imagen">
              </div> 
              <div class="col CrearLista_CajaTexto">
                <div class=" CrearLista_Texto"> 
                  <div class="form-floating">
                    <h3 class="product__title text-center mt-5"> <label >Nombre de la Lista</label></h3>
                    <input type="name" class="form-control" name="name"  required  value="<?= $nombre?>"> 
                  </div>
                  <div class="form-floating">
                    <h4 class="product__title text-center mt-5"> <label> Descripcion</label></h3>
                    <input type="descripcion" class="form-control" name="description"  required  value="<?= $descripcion?>"> 
                  </div>
                  
                  
                  <div class="item"> 
                    <p></p><p></p>
                    <label class="nav-link px-2 text-black text-center">Elija una imagen</label>
                      <input type="file" class="form-control" id="customFile" name="avatar" required> 
                  </div>
                  <p></p><p></p>
                  
                  <label class="nav-link px-2 text-black text-center"> <button type="button" class="btn btn-success ">Guardar</button></label>
                  <p></p><p></p>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>