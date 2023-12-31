<!DOCTYPE html>
<html lang="es">
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
                  <a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center" href="../../../home.php">
                   
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
        <body>
          <div class="container">
            <p></p>
            <h1>Carrito</h1>
            <hr>
            <table class="table">
                <thead>
                  <tr>
                  <th scope="col">#</th>
                  <th scope="col">Item</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Acción</th>
                  <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody id="items"></tbody>
                <tfoot>
                  <tr id="footer">
                  <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
                  </tr>
                  
                </tfoot>
                
                </table>
    
                
    
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  
                  <a href="PAGAR.php"><button class="btn btn-info  text-white " id="pagar-carrito" type="button">Pagar</button></a>
                </div><p></p>
              <div class="row" id="cards"></div>
              
              
            </div>
          
            <template id="template-footer">
                  <th scope="row" colspan="2">Total productos</th>
                  <td>10</td>
                  <td>
                      <button class="btn btn-danger btn-sm" id="vaciar-carrito">
                          vaciar todo
                      </button>
                  </td>
                  <td class="font-weight-bold">$ <span></span></td>
              </template>
              
              <template id="template-carrito">
                <tr>
                  <th scope="row">id</th>
                  <td>Café</td>
                  <td>1</td>
                  <td>
                      <button class="btn btn-info btn-sm">
                          +
                      </button>
                      <button class="btn btn-danger btn-sm">
                          -
                      </button>
                  </td>
                  <td>$ <span>500</span></td>
                </tr>
              </template>
          
        
    
    
    
            <template id="template-card">
              <div class="col-12 mb-2 col-md-4">
                <div class="card">
                  <img src="" alt="" class="card-img-top">
                <div class="card-body">
                  <h5>Titulo</h5>
                  <p>precio</p>
                  <button class="btn btn-dark">Comprar</button>
                </div>
                </div>
              </div>
              </template>
            
              
          <script src="../../js/app.js"></script>
          </body>
            
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
        
        <script src="../../../js/Modal_Curso.js"></script>
    </body>
</html>