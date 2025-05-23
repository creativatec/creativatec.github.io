<?php
$agregarInforRedes = new ControladorInformacionBasica();
$lsitar = $agregarInforRedes->agregarInformacionBasica();
$agregarRedes = new ControladorInformacionBasica();
$listarRedes = $agregarRedes->agregarRedes();
$carrito = new ModeloCarrito();
$cart = $carrito->countCarrito();
?>
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="cart" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">CREA</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">TIVA</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <!--<form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>-->
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Servicio al cliente</p>
            <h5 class="m-0"><a href="tel:+57<?php echo $lsitar[0]['telefono1'] ?>">+57 <?php echo $lsitar[0]['telefono1'] ?></a></h5>
        </div>
    </div>
</div>
<!-- Topbar End -->
<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <!--<a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categorías</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown dropright">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                            <a href="" class="dropdown-item">Men's Dresses</a>
                            <a href="" class="dropdown-item">Women's Dresses</a>
                            <a href="" class="dropdown-item">Baby's Dresses</a>
                        </div>
                    </div>
                    <a href="" class="nav-item nav-link">Shirts</a>
                    <a href="" class="nav-item nav-link">Jeans</a>
                    <a href="" class="nav-item nav-link">Swimwear</a>
                    <a href="" class="nav-item nav-link">Sleepwear</a>
                    <a href="" class="nav-item nav-link">Sportswear</a>
                    <a href="" class="nav-item nav-link">Jumpsuits</a>
                    <a href="" class="nav-item nav-link">Blazers</a>
                    <a href="" class="nav-item nav-link">Jackets</a>
                    <a href="" class="nav-item nav-link">Shoes</a>
                </div>
            </nav>-->
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">PROV</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">ERPET</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="inicio" class="nav-item nav-link <?php if ($_GET['action'] == 'inicio') {
                                                                        print 'active';
                                                                    } ?>">Inicio</a>
                        <a href="shop" class="nav-item nav-link <?php if ($_GET['action'] == 'shop') {
                                                                    print 'active';
                                                                } ?>">Productos</a>
                        <a href="cart" class="nav-item nav-link <?php if ($_GET['action'] == 'cart') {
                                                                    print 'active';
                                                                } ?>">Carrito de Compras</a>
                        <a href="contact" class="nav-item nav-link <?php if ($_GET['action'] == 'contact') {
                                                                        print 'active';
                                                                    } ?>">Contactos</a>
                        <?php
                        if (isset($_SESSION['validarTienda'])) {

                        ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Configuración Tienda <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="producto" class="dropdown-item">Producto</a>
                                    <a href="categoria" class="dropdown-item">Categoria</a>
                                    <a href="cliente" class="dropdown-item">Cliente</a>
                                    <a href="reviews" class="dropdown-item">Reviews</a>
                                    <a href="ventas" class="dropdown-item">Ventas</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <a href="salir" class="nav-item nav-link">Salir</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="cart" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php echo $cart[0]['COUNT(precio)'] ?></span>
                        </a>
                        <a href="ingresar" target="_blank" class="btn px-0 ml-3">
                            <i class="fas fa-user text-primary"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->