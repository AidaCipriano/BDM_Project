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
    <header class="p-2 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-10 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="Home.php" class="Titulo nav-ink">AETNA</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="dropdown">
              <button class="dropbtn">Tienda</button>
              <div class="dropdown-content">
                <a href="Tienda.php">Todos los productos</a>
                <a href="Listas.php">Categorias</a>
              </div>
            </div>
          </ul>
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-5" role="search">
            <input type="search" class="form-control " placeholder="Buscar ..." aria-label="Search">
          </form>
          <ul class="nav col-12 col-lg-auto  mb-md-0">
            <li>
              <a class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Usuario </a>
              <ul class="dropdown-menu dropdown-menu-dark ">
                <li><a class="dropdown-item" href="MiPerfil.php">Mi Perfil</a></li>
                <li><a class="dropdown-item" href="TodosProductos.php">Mis Productos</a></li>
                <li><a class="dropdown-item" href="MisOrdenes.php">Mis Ordenes</a></li>
                <li><a class="dropdown-item" href="MisCategorias.php">Mis Categorias</a></li>
                <li><a class="dropdown-item" href="Chat.php">Chat</a></li>
                <li><a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center" href="../../home.php"> Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>

      <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="../../img/avatar.jpg" alt="img-avatar">
                    <button type="button" class="boton-avatar">
                        <i class="far fa-image"></i>
                    </button>
                </div>
                <button type="button" class="boton-portada">
                    <i class="far fa-image"></i> Cambiar fondo
                </button>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <br>
            <div class="formulario">
                
                <div class="form-floating">
                    <input type="name" class="form-control"  placeholder="Ingrese su nombre" placeholder="Ingrese su nombre completo" name="name"
                    required> 
                    <label for="floatingInput">Nombre Completo</label>
                </div>
                <div class="form-floating"> 
                    <input type="input-email" class="form-control"  placeholder="Ingrese su email" name="email" 
                    pattern="^[a-z0-9!#$%'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$"
                    required> 
                    <label for="floatingInput">Email</label>
                </div>
        
                <div class="form-floating"> 
                    <input type="input-user" class="form-control"  placeholder="Ingrese su nombre de usuario" name="username" required> 
                    <label for="floatingInput">Usuario</label>
                </div>
        
                <div class="form-floating"> 
                    <input type="password" class="form-control"  placeholder="Ingrese su contaseña" name="password"
                    pattern="^(?=(?:.*[A-Z]){1})(?=(?:.*[a-z]){1})(?=(?:.*[0-9]){1})(?=(?:.*[?¿.,:;-]){1})\S{8,}"
                    minlength="8" required>
                    <label for="floatingInput">Contraseña</label>
        
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  type="sexo" name="sexo" id="sexo" >
                      <option selected>Elija una opcion</option>
                      <option value="1">Femenino</option>
                      <option value="2">Masculino</option>
                      <option value="3">No especificar</option>
                    </select>
                    <label for="floatingSelect">Sexo</label>
                </div>

                <br>
        
                <div class="item"> 
                    <label class="nav-link px-2 text-black text" >Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="nacimiento" required> 
                </div>
                
                <br>
                <div class="item"> 
                    <label class="nav-link px-2 text-black">Elija una imagen como avatar </label>
                        <input type="file" class="form-control" id="customFile" name="avatar" required> 
                </div>

                <p></p>
                <label class="nav-link px-2 text-black text-center"> <button type="submit" value="Enviar" class="btn btn-success ">Guardar Cambios</button></label>
                <p></p>
                <label class="nav-link px-2 text-black text-center"> <button type="submit" value="Enviar" class="btn btn-danger ">Borrar Cuenta</button></label>
                <br>
        
        </div>
        </section>




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
