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

          <main class="main">
            <section class="py-5 text-center container">
                <h1 class="fw-light">Mis Ventas</h1>
              
            </section>
            <div class="album py-5 bg-light">
              <div class="container">
                <div class="text-center">
                  <label for="floatingSelect">Filtro</label>
                  <select class="" id="floatingSelect" aria-label="Floating label select example"  id="TodosCursos" >
                    <option selected>Elija una opcion</option>
                    <option > Consulta detallada</option>
                    <option > Consulta agrupada</option>
                  </select>
                  <br><br>
                  <label for="floatingSelect">Todos los Cursos</label>
                  <select class="" id="floatingSelect" aria-label="Floating label select example"  id="TodosCursos" >
                    <option selected>Elija una opcion</option>
                    <option >Fecha y hora de la venta</option>
                    <option >Categoria</option>
                    <option >Producto</option>
                    <option >Calificacion</option>
                    <option >Precio</option>
                    <option >En Existencia</option>
                  </select>
                  <label> Categoria: </label>
                  <input id="Categoria">
                  <label> Producto: </label>
                  <input id="Producto">
                  <label> Fecha inicio: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
                  <label> Fecha final: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
                  <br><br>
                  <label for="floatingSelect">Por Curso</label>
                  <select class="" id="floatingSelect" aria-label="Floating label select example"  id="TodosCursos" >
                    <option selected>Elija una opcion</option>
                    <option >Mes-Año de la venta</option>
                    <option >Categoria</option>
                    <option >Ventas</option>
                  </select>
              
                  <label> Categoria: </label>
                  <input id="Categoria">
                  <label> Fecha inicio: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
                  <label> Fecha final: </label>
                  <input type="date"  id="fecha1" min="1910-01-01" max="2005-12-31"> 
              </div>
              <br>

                <div class="wrapper">
                  <div class="one"></div>
                 
                </div>

                
              </div>
             
             
            </div>

        </main>
 
          

        <script src="../../js/menu.js"></script>


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
    </body>





</html>