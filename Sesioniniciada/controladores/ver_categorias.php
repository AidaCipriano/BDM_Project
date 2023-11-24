<?php
  //session_start();
  include 'conexion.php';

  $id =  $_REQUEST['id'];


  $consulta = "CALL sp_Gestion('Mis Categorias', '$id')";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $id_categoria = $filas['id_categoria'];
    $nombre = $filas['nombre'];
    $creador = $filas['creador'];
    $descripcion = $filas['descripcion'];
    $nombrecompleto = $filas['nombrecompleto'];
    $fecha = $filas['creacion'];

  }

  include("CategoriasGestion.php");
  

?>

<main class="main">
    <section class="py-5 text-center container">
                <h1 class="fw-light">Mis Categorias</h1>
              
            </section>

            <div class="album py-5 bg-light">
                <div class="container">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php 
                    $consulta = "CALL sp_Gestion('Mis Categorias', '$id')";
                    $resultado = mysqli_query($conexion, $consulta);
                    while($filas = mysqli_fetch_array($resultado)){ ?>
                    <div class="col">
                      <div class="card shadow-sm">
                        <img src="https://concepto.de/wp-content/uploads/2014/08/programacion-2-e1551291144973.jpg" width="100%" height="225">
                        <div class="card-body">
                          <dt><p class="Nombre-lista" > <?php echo $filas['nombre'] ?> </p></dt>
                          <p>Creado por <?php echo $filas['nombrecompleto'] ?>, el <?php echo $filas['creacion'] ?></p>
                          <p class="card-text"> <?php echo $filas['descripcion'] ?></p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                              <a type="button" class="btn btn-sm btn-outline-secondary" href="DetallesCategorias.php?id=<?php echo( $id ); ?>">Ver</a>
                              <a type="button" class="btn btn-sm btn-outline-secondary" href="EditarCategoria.php?id=<?php echo( $id )?>&id_cat=<?php echo $filas['id_categoria']; ?>  ">Editar</a>
                              <button type="button" class="btn btn-sm btn-outline-secondary red">Eliminar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php } ?>

                      <div class="col">
                        <!--Boton-->
                        <div class="boton-modal">
                            <label for="btn-modal">
                                +
                            </label>
                        </div>
                        
                        <!--Fin de Boton-->
                        
                        <!--Ventana Modal-->  
                        <input type="checkbox" id="btn-modal"> 
                        <div class="container-modal">        
                          <div class="">
                            <div class="modal modal-alert position-static d-block  py-5" tabindex="-1" role="dialog" id="modalChoice">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content rounded-3 shadow">
                                  <div class="modal-body p-4 text-center">
                                    <h5 class="mb-0"><strong>Lista Nueva</strong>  </h5>
                                    <p></p>
                                    <p class="mb-0">¿Desea crear una nueva lista?</p>
                                    
                                  </div>
                                  <div class="modal-footer flex-nowrap p-0 ">
                                    <a href="CrearCategoria.php?id=<?php echo( $id ); ?>" >
                                      
                                      <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end text-center" ><strong>Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></button>

                                    </a>
                                    
                                    <div class="">
                                      <label type="button"  for="btn-modal" class="btn btn-lg btn-link fs-6 text-decoration-none rounded-0" data-bs-dismiss="modal">No</label>
                                  </div>
                                  </div>
                                </div>
                              </div>
                              
                            </div> 
                          </div>
                          <label for="btn-modal" class="cerrar-modal"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

        </main>
 