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
        <body class="bg-light">
            <div class="container">
                <div class="py-5 text-center">
                    <h2>Checkout form</h2>
                </div>
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                          <span class="text-primary">Your cart</span>
                          <span class="badge bg-primary rounded-pill">3</span>
                        </h4>
                        <ul class="list-group mb-3">
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Product name</h6>
                              <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$12</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Second product</h6>
                              <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$8</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                              <h6 class="my-0">Third item</h6>
                              <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted">$5</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                              <h6 class="my-0">Promo code</h6>
                              <small>EXAMPLECODE</small>
                            </div>
                            <span class="text-success">−$5</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>$20</strong>
                          </li>
                        </ul>
                        
                        <form class="card p-2">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                          </div>
                        </form>
                      
                    </div>
                      
                    
                    <div class="col-md-7 col-lg-8">
                    
                        <h4 class="mb-3">Billing address</h4>
                        
                        <form class="needs-validation" novalidate>
                        
                            <div class="row g-3">
                            
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
        
                            
                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">@</span>
                                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
    
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                    <div class="invalid-feedback">Please enter your shipping address.</div>
                            
                                </div>
                                
                                <div class="col-12">
                                    <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                                </div>
                                
                                <div class="col-md-5">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" required>
                                        <option value="">Choose...</option>
                                        <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" id="state" required>
                                        <option value="">Choose...</option>
                                        <option>California</option>
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid state.</div>
                                    </div>
        
                            
                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                              
                                        <input type="text" class="form-control" id="zip" placeholder="" required>
                              
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                          
                        
                        
                                </div>
                                <hr class="my-4">
        
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="same-address">
                                    <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                                </div>
        
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="save-info">
                                    <label class="form-check-label" for="save-info">Save this information for next time</label>
                                </div>
        
                                <hr class="my-4">
                
                                <h4 class="mb-3">Payment</h4>
        
                                <div class="my-3">
                                    <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                                    <label class="form-check-label" for="credit">Credit card</label>
                                    </div>
                                    <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                    <label class="form-check-label" for="debit">Debit card</label>
                                    </div>
                                    <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                                    <label class="form-check-label" for="paypal">PayPal</label>
                                    </div>
                                </div>
        
                                
                                <div class="row gy-3">
                                    <div class="col-md-6">
                                    <label for="cc-name" class="form-label">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                    <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>
                
                                    <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>
                
                                    <div class="col-md-3">
                                    <label for="cc-expiration" class="form-label">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                    </div>
                
                                    <div class="col-md-3">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Security code required
                                        </div>
                                    </div>
                                </div>
        
                          
                          
                                <hr class="my-4">
                                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                        
                        </form>
                    </div>
                </div>
            </div>
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
