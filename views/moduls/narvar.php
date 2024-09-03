<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

<!-- ========================= header start ========================= -->
<header class="header navbar-area">
    <!-- Toolbar Start -->
    <div class="toolbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9 col-12">
                    <div class="toolbar-contact">
                        <p><i class="lni lni-envelope"></i><a href="mailto:inf  o@yourwebsite.com">info@yourwebsite.com</a></p>
                        <p><i class="lni lni-phone"></i><a href="tel:+573122146368">(+57) 3122146368</a></p>
                        <p><i class="lni lni-map-marker"></i> Cra 12 19-16 Bra Sucre</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-12">
                    <div class="toolbar-sl-share">
                        <ul>
                            <li><a href="https://www.facebook.com/creativabrandmarketing/" target="_blank"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="#" target="_blank"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="#" target="_blank"><i class="lni lni-pinterest"></i></a></li>
                            <li><a href="#" target="_blank"><i class="lni lni-youtube"></i></a></li>
                            <li><a href="ingresar" target="_blank"><i class="lni lni-user"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Toolbar End -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="inicio">
                            <img src="assets/images/LOGO CREATIVA PNG.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="page-scroll <?php if (isset($_GET['action'])) {
                                                                if ($_GET['action'] == 'inicio') {
                                                                    print 'active';
                                                                }
                                                            } ?>" href="inicio">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll <?php if (isset($_GET['action'])) {
                                                                if ($_GET['action'] == 'nosotros') {
                                                                    print 'active';
                                                                }
                                                            } ?>" href="nosotros">Sobre Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll <?php if (isset($_GET['action'])) {
                                                                if ($_GET['action'] == 'servicios') {
                                                                    print 'active';
                                                                }
                                                            } ?>" href="servicios">Servicios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll <?php if (isset($_GET['action'])) {
                                                                if ($_GET['action'] == 'portafolio') {
                                                                    print 'active';
                                                                }
                                                            } ?>" href="portafolio">Portafolio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll <?php if (isset($_GET['action'])) {
                                                                if ($_GET['action'] == 'contactanos') {
                                                                    print 'active';
                                                                }
                                                            } ?>" href="contactanos">Contacto</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                        <div class="button">
                            <a href="contactanos" class="btn white-bg mouse-dir">Consigue Una Cotización<span class="dir-part"></span></a>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->

</header>
<!-- ========================= header end ========================= -->