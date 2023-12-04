<?php
 include ('controlador.php');
 $id =  $_REQUEST['id'];

  $consulta = "CALL sp_Gestion('Editar Perfil', '$id')";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $rol =  $filas['rol'];

  }
?>


<main class="main">
    <div class="row ">
    <form action="" method="post" id="form_categoria"  enctype="multipart/form-data" >
            <div class="">
              <div class="row g-0 border rounded mb-4 shadow-sm ">
              <div class="col CrearLista_CajaImagen " >
                <img src="../../../img/Listas/img/Predeterminado.jpg" width="100%" class="CrearLista_Imagen">
              </div> 
              <div class="col CrearLista_CajaTexto">
              <div class=" CrearLista_Texto"> 
                  <div class="form-floating">
                    <h3 class="product__title text-center mt-5"> <label >Nombre de la Lista</label></h3>
                    <input type="name" class="form-control" id= "nombre_categoria" name="nombre_categoria"
                      required> 
                  </div>
                  <input type="input-email" class="form-control"  id="btn_id"  name="usuario_id" value="<?= $idusuario?>" >
                  <div class="form-floating">
                    <h4 class="product__title text-center mt-5"> <label> Descripcion</label></h3>
                    <input type="descripcion" class="form-control" name="descripcion"  id= "descripcioncat" 
                    required> 
                  </div>

                  
                    <h4 class="product__title text-center mt-5"> <label> Imagen</label></h3>
                    <input type="file" class="form-control" id="customFile" id="fileTest" name="fileTest" required> 

                  
                    

                  <div class="form-floating"> 
                    <input type="input-user" class="form-control"  id="btn_rol" name="rol" value="<?= $rol?>" > 
                    
                  </div>
                
                  <p></p><p></p>
                  <div class="espacio_Boton">
                    <label class="nav-link px-2 text-black text-center"> 
                      <input class="btn btn-success" onclick="btn_guardarCategoria();" value="Guardar">
                      <p class="warnings" id="warnings"></p>
                      <input class="btn btn-primary"  type="submit"  name="CrearCategoria"  id="btn_guardar_categoria" value="Enviar">
                    </label>
                  </div>
                  <p></p><p></p>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

    </main>