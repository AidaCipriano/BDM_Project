<?php
  include ('controlador.php');

?>

<header class="p-2 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <ul class="nav col-10 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="Home.php?id=<?php echo( $id ); ?>" class="Titulo nav-ink">AETNA</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="dropdown">
              <button class="dropbtn">Tienda</button>
              <div class="dropdown-content">
                <a href="Tienda.php?id=<?php echo( $id ); ?>">Todos los productos</a>
                <a href="Listas.php?id=<?php echo( $id ); ?>">Categorias</a>
              </div>
            </div>
          </ul>
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-5" role="search">
            <input onkeyup="buscar_ahora($('#buscar_1').val());" type="search" class="form-control " placeholder="Buscar ..." aria-label="Search">
          </form>
          <ul class="nav col-12 col-lg-auto  mb-md-0">
            <li>
              <a class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo( $usuario ); ?>  </a>
              <ul class="dropdown-menu dropdown-menu-dark ">
                <li><a class="dropdown-item" href="MiPerfil.php?id=<?php echo( $id ); ?>">Mi Perfil</a></li>
                <li><a class="dropdown-item" href="TodosProductos.php?id=<?php echo( $id ); ?>">Mis Productos</a></li>
                <li><a class="dropdown-item" href="MisOrdenes.php?id=<?php echo( $id ); ?>">Mis Ordenes</a></li>
                <li><a class="dropdown-item" href="MisCategorias.php?id=<?php echo( $id ); ?>">Mis Categorias</a></li>
                <li><a class="dropdown-item" href="Chat.php?id=<?php echo( $id ); ?>">Chat</a></li>
                <li><a class="dropdown-item dropdown-item-danger d-flex gap-2 align-items-center" href="../../home.php"> Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>