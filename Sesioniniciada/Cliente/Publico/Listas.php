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
    <header class="p-2 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-10 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="Home.php" class="Titulo nav-ink">AETNA</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="dropdown">
              <button class="dropbtn">Tienda</button>
              <div class="dropdown-content">
                <a href="Tienda.php">Todos los cursos</a>
                <a href="Listas.php">Categorias</a>
              </div>
            </div>
          </ul>
          
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-5" role="search">
            <input type="search" class="form-control " placeholder="Buscar ..." aria-label="Search">
          </form>

          <div class="text-end">
              <a href="Carrito.php" class="nav-link px-2 text-white"> <i class="fa-solid fa-cart-shopping"></i> &nbsp;&nbsp;Carrito </a>
              
          </div>&nbsp;&nbsp;
          
          <ul class="nav col-12 col-lg-auto  mb-md-0">
            <li>
                <a class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Usuario </a>
                <ul class="dropdown-menu dropdown-menu-dark ">
                  <li><a class="dropdown-item" href="MiPerfilPublico.php">Mi Perfil</a></li>
                  <li><a class="dropdown-item" href="MisPedidos.php">Mis Pedidos</a></li>
                  <li><a class="dropdown-item" href="MisCategorias.php">Mis Categorias</a></li>     
                  <li><a class="dropdown-item" href="Chat.php">Chat</a></li>                   
                  <li>
                    <a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center" href="../../../home.php"
                      Cerrar sesión
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
        </div>
      </div>
    </header>
        <main class="main">
            <section class="py-5 text-center container">
                <h1 class="fw-light">Categorias</h1>
              
            </section>

            <div class="album py-5 bg-light">
                <div class="container">
            
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">

                          <img src="https://concepto.de/wp-content/uploads/2014/08/programacion-2-e1551291144973.jpg" width="100%" height="225">
                          <div class="card-body">
                            <dt><p class="Nombre-lista">Programacion</p></dt>
                            <p>Creado por Juan Perez, el 23/02/2023 a las 13:05 horas</p>
                            <p class="card-text">Adentrate en los campos de la era moderna y del futuro.</p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <a type="button" class="btn btn-sm btn-outline-secondary" href="DetallesCategorias.php">Ver</a>

                                

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                  </div>
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

