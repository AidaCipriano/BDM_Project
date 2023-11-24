<?php
 include ('controlador.php');
 $id =  $_REQUEST['id'];

  $consulta = "CALL sp_Gestion('Editar Perfil', '$id')";
  $resultado = mysqli_query($conexion, $consulta);

  while($filas = mysqli_fetch_array($resultado)){
    $nombre= $filas['nombres'];
    $apellido= $filas['apellidos'];
    $email= $filas['email'];
    $_usuario= $filas['nombreusuario'];
    $password= $filas['contrasena'];
    $sexo= $filas['genero'];
    $nacimiento= $filas['nacimiento'];
   
    $idusuario = $filas['id_usuario'];
    $avatar = ($filas['imagen']);

  }
  include("UpdatePerfil.php");
?>

<section class="seccion-perfil-usuario">
      <div class="perfil-usuario-header">
        <div class="perfil-usuario-portada">
          <div class="perfil-usuario-avatar">
            <img src="<?php echo $avatar; ?>" alt="img-avatar">
            
          </div>
        </div>
      </div>
      <div class="perfil-usuario-body">
        <br>
        <form action="" method="POST" id="form" class="form-register" >
          <div class="formulario" id="form">
            <div class="form-floating">
              <input type="name" class="form-control"  placeholder="Ingrese su nombre" placeholder="Ingrese su nombre" id="name" name="name"  value="<?= $nombre?>"> 
              <label for="floatingInput">Nombre/s</label>
            </div>
            <div class="form-floating">
              <input type="apellido" class="form-control"  placeholder="Ingrese su apellido" placeholder="Ingrese su apellido" id="apellido" name="apellido"  value="<?= $apellido?>" > 
              <label for="floatingInput">Apellido/s</label>
            </div>
            <div class="form-floating"> 
              <input type="input-email" class="form-control"  placeholder="Ingrese su email" id="email" name="email" value="<?= $email?>" > 
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating"> 
            <input type="input-user" class="form-control"  placeholder="Ingrese su nombre de usuario" id="username" name="username" value="<?= $_usuario?>" > 
            <label for="floatingInput">Usuario</label>

          </div>
          <div class="form-floating"> 
            <input type="password" class="form-control"  placeholder="Ingrese su contaseña" id="password" name="password"  value="<?= $password?>" >
            <label for="floatingInput">Contraseña</label>
          </div>
          <div class="form-floating">
            <select class="form-select" aria-label="Floating label select example"  id="sexo" name="sexo" >           
              <option selected>Seleccione una opcion</option>
              <option value="1">Femenino</option>
              <option value="2">Masculino</option>
              <option value="3">No especificar</option>
            </select>
            <label for="floatingSelect">Sexo</label>
          </div>
          <br>
          <div class="item"> 
            <label class="nav-link px-2 text-black text" >Fecha de nacimiento</label>
            <input type="date" class="form-control" id="nacimiento" name="nacimiento"value="<?= $nacimiento?>" max="2005-11-30" min="1923-01-01">
          </div>
          <br>
          <div class="item"> 
            <label class="nav-link px-2 text-black text" >Elija una imagen como avatar </label>
            <input type="file" class="form-control" id="customFile" id="avatar" name="avatar" value="<?= $avatar?>" >
          </div>
          <input type="input-email" class="form-control"  id="btn_id" name="usuario_id" value="<?= $idusuario?>" >
          <input class="form-control"  id="selecsexo"  value="<?= $sexo?>" >
          
          <div class="espacio_Boton">
            <label class="nav-link px-2 text-black text-center"> 
              <input class="btn btn-success" onclick="btn_updatePerfil();" value="Guardar Cambios">
              <p class="warnings" id="warnings"></p>
              <input class="btn btn-primary"  type="submit"  name="ActPerfil"  id="btn_update_Perfil" value="Enviar">
            </label>
            <p></p>
            <label class="nav-link px-2 text-black text-center"> 
              <input class="btn btn-danger"  type="submit"  name="deletePerfil"  id="btn_delete_Perfil" value="Borrar Cuenta">
            </label>
          </div>
        </form>
      </div>
    </section>